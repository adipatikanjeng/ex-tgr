<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account\KpHeader;
use App\Models\Bank;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order\Partial;
use App\Models\Order\Product as OrderProduct;
use App\Models\Payment\Confirmation;
use App\User;
use Auth;
use Carbon;
use Hash;
use Illuminate\Http\Request;
use \Webarq\Site\Models\Setting;

class CustomerController extends Controller {
	public function __construct() {
		$this->middleware('auth.customer', ['only' => 'getIndex']);
	}

	public function getIndex() {
		$model = new Customer;
		$row = $model->find(Auth::user()->customer->id);

		return view('customer.profile', compact('row'));
	}

	public function postIndex(Request $request) {
		$this->validate($request, [
			'password' => 'confirmed',
			'zip_code' => 'required|max:5',
			]);

		$model = Customer::find(Auth::user()->customer->id);
		$model->name = $request->name;
		$model->user_id = Auth::user()->id;
		$model->id_number = $request->id_number;
		$model->place_of_birth = $request->place_of_birth;
		$model->date_of_birth = date('Y-m-d',strtotime($request->date_of_birth));
		$model->religion = $request->religion;
		$model->zip_code = $request->zip_code;
		$model->gender = $request->gender;
		$model->address = $request->address;
		$model->citizen = $request->citizen;
		$model->telephone = $request->telephone;
		$model->merital_status = $request->merital_status;
		$model->tax_number = $request->tax_number;
		$model->update();
		if ($request->password && ($request->password == $request->password_confirmation)) {
			$user = new User;
			$user = $user->find(Auth::user()->id);
			$user->password = $request->password;
			$user->save();
		}

		return redirect()->back()->withInput()->with('message', 'Ubah Profile Suksess');
	}

	public function getRegister() {
		return view('customer.register');
	}

	public function postRegister(Request $request) {
		$this->validate($request, [
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed',
			'name' => 'required',
			'place_of_birth' => 'required',
			'date_of_birth' => 'required',
			'gender' => 'required',
			'g-recaptcha-response' => 'required|recaptcha',
			]);


		$model = new User();
		$model->email = $request->email;
		$model->password = Hash::make($request->password);
		$model->activation_code = str_random(60);
		$model->save();

		$customer = new Customer();
		$customer->user_id = $model->id;
		$customer->gender = $request->gender;
		$customer->name = $request->name;
		$customer->place_of_birth = $request->place_of_birth;
		$customer->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
		$customer->save();

		$data['activation_code'] = $model->activation_code;
		$data['email'] = $model->email;
		$data['name'] = $customer->name;

		\Mail::send('emails.register', $data, function ($message) use ($data) {
			$message->from(\Webarq\Site\Models\Setting::ofCodeType('email', 'noreply')->value);
			$message->subject("Welcome to Tigaraksa");
			$message->to($data['email']);
		});

		return redirect()->back()->with('message', trans('global.register-success'));
	}

	public function getOrderHistories() {
		$model = new Order;
		$rows = $model->where('customer_id', Auth::user()->customer->id)->paginate(10);

		return view('customer.order-history', compact('rows'));
	}

	public function getPaymentConfirmation($orderNumber = null) {
		$bankList = Bank::select(\DB::raw('CONCAT(name, " ",account_number) as bank_account, id'))->lists('bank_account', 'id');
		return view('customer.confirm_payment', compact('bankList', 'orderNumber'));
	}

	public function postPaymentConfirmation(Request $request) {
		$this->validate($request, [
			'order_number' => 'required|exists:orders',
			'bank_id' => 'required',
			'bank_name' => 'required',
			'account_number' => 'required',
			'account_name' => 'required',
			'transfer_date' => 'required',
			'amount' => 'required',
			]
			);

		$model = new Confirmation;
		$model->order_number = $request->order_number;
		$model->bank_id = $request->bank_id;
		$model->bank_name = $request->bank_name;
		$model->account_name = $request->account_name;
		$model->account_number = $request->account_number;
		$model->transfer_date = Carbon::parse($request->transfer_date)->format('Y-m-d h:i:s');
		$model->amount = $request->amount;
		if ($request->hasFile('file')) {
			$request->file('file')->move(public_path('contents'), $model->order_number . '_' . Carbon::now()->format('Ymdhms') . '.' . $request->file('file')->getClientOriginalExtension());
			$model->file = $model->order_number . '_' . Carbon::now()->format('Ymdhms') . '.' . $request->file('file')->getClientOriginalExtension();
		}
		$model->save();

		$this->sendEmailNotification($model->order);

		return redirect()->back()->with('message', trans('global.payment-confirmation'));
	}

	public function getTrackingOrders() {
		return view('customer.tracking_order');
	}

	public function postTrackingOrders(Request $request) {
		if($order = Order::where('order_number', $request->kp_number)->first())
		{
			$orderNumber = Partial::where('order_id', $order->id)->first()->order_number;
			$kpHeader = KpHeader::where('skh_so_kp_number', $orderNumber)->first();
			if ($kpHeader) {
				$status = 'processing';
				$row = $kpHeader;
			} else {
				$row = $order;
				$status = 'entry';
			}
		} else {
			return redirect('customers/tracking-orders')->with('message', trans('global.error-order-number'));
		}
		return view('customer.tracking_order', compact('row', 'status'));
	}

	public function getEmailConfirmation($activationCode) {
		$checkCode = User::where('activation_code', $activationCode)->first();
		if ($checkCode) {
			$checkCode->is_active = 'Y';
			$checkCode->activation_code = null;
			$checkCode->update();
			return redirect('customers/auth/login')->with('message', trans('global.activated-user'));
		} else {
			return redirect('customers/register')->with('message', 'Anda belum register');
		}
	}
	public function getInvoice(Order $order, $id) {
		$order = $order->find($id);
		$orderProducts = OrderProduct::where('order_id', $order->id)->get();
		$contact['address'] = Setting::ofCodeType('address', 'contact')->value;
		$contact['npwp'] = Setting::ofCodeType('npwp', 'contact')->value;

		return \PDF::loadView('customer.invoice', compact('order', 'contact', 'orderProducts'))->setOrientation('landscape')->download('invoice_' . $order->order_number . '_' . date('d-m-Y') . '.pdf');
	}

	public function sendEmailNotification($datas) {
		//to customer
		$data['email'] = $datas->customer->user->email;
		$data['name'] = $datas->customer->name;
		$data['orderNumber'] = $datas->order_number;
		$data['shippingFee'] = $datas->shipping_amount;
		$product = [];
		$totalPrice = 0;
		foreach ($datas->products as $key => $row) {
			$product[$key]['name'] = $row->product->name;
			$product[$key]['total_price'] = $row->total_price;
			$product[$key]['quantity'] = $row->quantity;
			$totalPrice += $row->total_price;
		}
		$data['products'] = $product;
		$data['products']['totalPrice'] = $totalPrice;
		$data['products']['subTotalPrice'] = $totalPrice + $datas->shipping_amount;
		//to admin

		$product = [];
		$totalPrice = 0;
		$groupByCategory = [];
		foreach ($datas->products as $key => $row) {
			$product[$key]['name'] = $row->product->name;
			$product[$key]['total_price'] = $row->total_price;
			$product[$key]['quantity'] = $row->quantity;
			$product[$key]['category'] = $row->product->category_id;
			$totalPrice += $row->total_price;
		}

		$data['products'] = $product;
		$data['products']['totalPrice'] = $totalPrice;

		\Mail::send('emails.payment-notification-admin', $data, function ($message) use ($data) {
			$message->from($data['email']);
			$message->subject("Payment Notification");
			$message->to(\Webarq\Site\Models\Setting::ofCodeType('email', 'admin')->value);
		});
	}
}
