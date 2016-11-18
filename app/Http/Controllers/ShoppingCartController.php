<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Auth;
use Session;
use App\Models\Province;
use App\Models\City;
use App\Models\Order;
use App\Models\Order\Partial;
use App\Models\Shipping\Fee;
use App\Models\Shipping\Address;
use App\Models\Shipping\BillingAddress;
use App\Models\Bank;
use \Webarq\Site\Models\Setting;
use App\Models\Page;
use App\Models\Branch\Coverage;

class ShoppingCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.customer', ['except' => ['getIndex', 'getBuy', 'getDetailOrders', 'postAjaxUpdateQuantity', 'getSuccessPage', 'postAjaxBuyOnline', 'getDeleteProduct']]);
        \Veritrans_Config::$serverKey = config('veritrans.server_key');
        \Veritrans_Config::$isProduction = config('veritrans.is_production');
    }
    public function getIndex(Request $request)
    {
        if(Auth::check()){
            $cart = Cart::where('customer_id', Auth::user()->customer->id)->first();
        }else{
            $cart = Cart::where('session_code', Session::getId())->first();
        }
        $rows = ($cart) ? Cart\Product::where('cart_id', $cart->id)->get() : [];

        return view('shopping-cart.index', compact('rows'));
    }

    public function getBuy(Request $request, $productId = null)
    {
        if ( ! $productId) return redirect('/');

        $product = Product::find($productId);
        $product->stock = $product->stock - 1;
        $product->update();

        $productPrice = \App\Site::pricelist($productId)->total_price;

        if(Auth::check()){
            $model = (Cart::where('customer_id', Auth::user()->customer->id)->first()) ?: new Cart;
            $model->customer_id = Auth::user()->customer->id;
            $model->save();

            $product = (Cart\Product::where('product_id', $productId)->where('cart_id', $model->id)->first()) ?: new Cart\Product;
            $product->product_id = $productId;
            $product->quantity = ($product) ? ($product->quantity + 1) : 1;
            $product->cart_id = $model->id;
            $product->price = ($product) ? ($product->quantity * $productPrice) : $productPrice ;
            $product->save();

            $updateCart = Cart::find($model->id);
            $updateCart->total_amount = Cart\Product::whereCartId($model->id)->sum('price');
            $updateCart->save();
        } else {
            $model = (Cart::where('session_code', Session::getId())->first()) ?: new Cart;
            $model->session_code = Session::getId();
            $model->save();

            $product = (Cart\Product::where('cart_id', $model->id )->where('product_id', $productId)->first()) ?: new Cart\Product;
            $product->product_id = $productId;
            $product->quantity = ($product) ? ($product->quantity + 1) : 1;
            $product->cart_id = $model->id;
            $product->price = ($product) ? ($product->quantity * $productPrice) : $productPrice;
            $product->save();

            $updateCart = Cart::find($model->id);
            $updateCart->total_amount = Cart\Product::whereCartId($model->id)->sum('price');
            $updateCart->save();
        }

        return redirect('shopping-cart');
    }

    public function getShipping()
    {
        $cart = Cart::where('customer_id', Auth::user()->customer->id)->first();
        $rows = ($cart) ? $cart->products()->get() : [];

        $provinces = Province::lists('name', 'id');
        $cities = City::lists('name', 'id');

        $shippingAddress = Address::where('customer_id', Auth::user()->customer->id)->first();
        $shippingAddress = ($shippingAddress) ?: [];

        return view('shopping-cart.shipping', compact('rows', 'provinces', 'cities', 'shippingAddress'));
    }

    public function postShipping(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'telephone' =>'required',
            'term_n_condition' =>'required',
            ]);

        $address = (Address::where('customer_id', Auth::user()->customer->id)->first()) ?: new Address;
        $address->customer_id = Auth::user()->customer->id;
        $address->name = $request->name;
        $address->city_id = $request->city_id;
        $address->telephone = $request->telephone;
        $address->address = $request->address;
        $address->save();

        if($request->other_billing_address)
        {
            return redirect('shopping-cart/billing-address');
        }

        return redirect('shopping-cart/payment');
    }

    public function getPayment(Request $request)
    {
        $this->updateQuantity($request);
        $cart = Cart::where('customer_id', Auth::user()->customer->id)->first();
        if(!$cart)
            return redirect()->back()->with('message', 'Anda tidak mempunyai belanjaan!');

        $rows = ($cart) ? $cart->products()->get() : [];
        $address = Address::where('customer_id', Auth::user()->customer->id)->first();
        if(!$address)
        {
            return redirect('shopping-cart/shipping');
        }
        $cartProduct = Cart\Product::where('cart_id', $cart->id)->ofWeightVolume()->first();
        $fee = \App\Site::ShippingFee($address->city_id, $cartProduct->total_weight, $cartProduct->total_volume);
        $banks = Bank::all();
        $billingAddress = (BillingAddress::where('customer_id', Auth::user()->customer->id)->first()) ?: $address;

        return view('shopping-cart.payment', compact('rows', 'fee', 'address', 'billingAddress', 'banks'));
    }

    public function postPayment(Request $request)
    {
        $shippingAddress = Address::where('customer_id', Auth::user()->customer->id)->first();
        $shippingCost = $request->shipping_cost;
        $cart = Cart::where('customer_id', Auth::user()->customer->id)->first();

        if($cart){
            $model = new Order;
            $model->customer_id = Auth::user()->customer->id;
            $model->order_number = \App\Site::orderNumber();
            $model->total_amount = $cart->total_amount + $shippingCost;
            $model->payment_method = $request->payment_method;
            $model->status_id = 1;
            $model->shipping_amount = $shippingCost;
            $model->save();

            $cartProducts = Cart\Product::where('cart_id', $cart->id);
            foreach($cartProducts->get() as $row) {
                $orderProduct = new Order\Product;
                $orderProduct->order_id = $model->id;
                $orderProduct->product_id = $row->product_id;
                $orderProduct->quantity = $row->quantity;
                $orderProduct->total_price = $row->price;
                $orderProduct->save();
            }
            $productCategory = $cartProducts->ofOrderCategory();
            $shippingAmount = $shippingCost / count($productCategory->get());
            foreach ($productCategory->get() as $row) {
                $orderPartial = new Partial;
                $orderPartial->order_id = $model->id;
                $orderPartial->order_number = \App\Site::orderNumberPartial();
                $orderPartial->total_amount = $row->total_price;
                $orderPartial->shipping_amount = $shippingAmount;
                $orderPartial->product_category_id = $row->category_id;
                $orderPartial->save();
            }
            foreach(Order\Product::where('order_id', $model->id)->get() as $row) {
                foreach(Order\Partial::where('product_category_id', $row->product->category_id)->get() as $childRow){
                    $orderPartialProduct = new Order\Partial\Product;
                    $orderPartialProduct->order_partial_id = $childRow->id;
                    $orderPartialProduct->product_id = $row->product_id;
                    $orderPartialProduct->quantity = $row->quantity;
                    $orderPartialProduct->total_price = $row->total_price;
                    $orderPartialProduct->product_pricelist_code = \App\Site::pricelist($row->product_id)->code;
                    $orderPartialProduct->save();
                }
            }

            $cart->delete();
            $cartProducts->delete();

            if($request->payment_method == 'Credit Card') {
                return redirect()->away($this->paymentVeritrans($model));
            }else{
                $this->sendEmailNotification($model);
            }

        }else{
            return redirect()->back()->withInput()->with('message', trans('global.dont-have-cart'));
        }

        return redirect('shopping-cart/detail-orders/'.$model->order_number);
    }

    public function getSuccessPage($orderNumber = null)
    {
        if ( ! $orderNumber) return redirect('/');
        $customerEmail = Auth::user()->email;
        return view('shopping-cart.success-page', compact('orderNumber', 'customerEmail'));
    }

    public function getCreditCardPaymentSuccess(Request $request)
    {
        $order = Order::where('customer_id', Auth::user()->customer->id)->where('order_number', $request->order_id)->first();
        if ( ! $order) return redirect('/');

        $order->status_id = 3;
        $order->save();
        $this->sendEmailNotification($order);

        return redirect(\App::getLocale().'/shopping-cart/detail-orders/'.$order->order_number);
    }

    public function getCreditCardPaymentFailed(Request $request)
    {
        $order = Order::where('order_number', $request->order_id)->first();
        if ( ! $order) return redirect('/');

        $order->status_id = 2;
        $order->save();
        $orderNumber = $request->order_id;

        return view('shopping-cart.failed-page', compact('orderNumber'));
    }

    public function getDetailOrders(Request $request, $orderNumber = null)
    {
        $orderNumber = ($orderNumber) ?: $request->order_id;
        $order = Order::whereOrderNumber($orderNumber)->first();
        if ( ! $order) return redirect('/');

        $rows = ($order) ? $order->products()->get() : [];
        $address = Address::whereCustomerId($order->customer_id)->first();
        $billingAddress = (BillingAddress::whereCustomerId($order->customer_id)->first()) ?: $address;

        return view('shopping-cart.detail-order', compact('rows', 'address', 'billingAddress', 'order'));
    }

    public function getAjaxCities($provinceId)
    {
        $cities = City::where('province_id', $provinceId)->lists('name', 'id');

        return response()->json(['html' => view('partial.city', compact('cities'))->render()]);
    }

    public function getBillingAddress()
    {
        $cart = Cart::where('customer_id', Auth::user()->customer->id)->first();
        $rows = ($cart) ? $cart->products()->get() : [];

        $provinces = Province::lists('name', 'id');
        $cities = City::lists('name', 'id');
        $address = Address::where('customer_id', Auth::user()->customer->id)->first();
        $billingAddress = (BillingAddress::where('customer_id', Auth::user()->customer->id)->first()) ?: $address;

        return view('shopping-cart.billing-address', compact('rows', 'provinces', 'cities', 'billingAddress'));
    }

    public function postBillingAddress(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'telephone' =>'required',
            ]);
        $address = new BillingAddress;
        $address->customer_id = Auth::user()->customer->id;
        $address->name = $request->name;
        $address->city_id = $request->city_id;
        $address->telephone = $request->telephone;
        $address->address = $request->address;
        $address->save();

        return redirect('shopping-cart/payment');
    }

    public static function updateQuantity($request)
    {

        for($i = 0; $i < count($request->id); $i++) {
            $model = Cart\Product::find($request->id[$i]);
            $model->quantity = $request->quantity[$i];
            $model->update();
        }
    }

    private function paymentVeritrans($order)
    {
        $billingAddress = BillingAddress::where('customer_id', $order->customer_id)->first();
        if($billingAddress) {
            $billingAddress = [
            'first_name' => Auth::user()->customer->name,
            'last_name' => '',
            'address' => $billingAddress->address,
            'city' => $billingAddress->city->name,
            'postal_code' => $billingAddress->city->postal_code,
            'phone' => $billingAddress->telephone,
            'country_code' => 'IDN'
            ];
        }

        $shippingAddress = Address::where('customer_id', $order->customer_id)->first();
        $shippingAddress = [
        'first_name' => Auth::user()->customer->name,
        'last_name' => '',
        'address' => $shippingAddress->address,
        'city' => $shippingAddress->city->name,
        'postal_code' => $shippingAddress->city->postal_code,
        'phone' => $shippingAddress->telephone,
        'country_code' => 'IDN'
        ];

        foreach ($order->products as $orderProduct) {
            $itemDetails[] = [
            'id' => $orderProduct->product_id,
            'price' => (int) $orderProduct->total_price / $orderProduct->quantity,
            'quantity' => $orderProduct->quantity,
            'name' => $orderProduct->product->name
            ];
        }

        $shippingItem = [
        'id' => 'SHIPPING',
        'price' => (int) $order->shipping_amount,
        'quantity' => 1,
        'name' => 'Home Delivery'
        ];

        $itemDetails[] = $shippingItem;
        $customerDetails = [
        'first_name' => Auth::user()->customer->name,
        'last_name' => '',
        'email' =>  Auth::user()->email,
        'phone' => Auth::user()->customer->telephone,
        'billing_address' => ($billingAddress) ?: $shippingAddress,
        'shipping_address' => $shippingAddress
        ];

        $transactionDetails = [
        'payment_type' => 'vtweb',
        'vtweb' => [
        'credit_card_3d_secure' => true,
        ],
        'transaction_details' => [
        'order_id' => $order->order_number,
        'gross_amount' => (int) $order->total_amount,
        ],
        'customer_details' => $customerDetails,
        'item_details' => $itemDetails,
        ];

        return \Veritrans_VtWeb::getRedirectionUrl($transactionDetails);
    }

    public function getDeleteProduct($productId)
    {
        $product = Cart\Product::find($productId);
        $cart = Cart::where('id', $product->cart_id)->first();
        $cart->total_amount = $cart->total_amount - $product->price;
        $cart->update();
        $product->delete();

        return redirect('shopping-cart');
    }

    public function postAjaxBuyOnline(Request $request)
    {
      $product = Product::find($request->product_id);
      $product->stock = $product->stock - 1;
      $product->update();

      $productPrice = \App\Site::pricelist($request->product_id)->total_price;

      if(Auth::check())
      {
        $model = (Cart::where('customer_id', Auth::user()->customer->id)->first()) ?: new Cart;
        $model->customer_id = Auth::user()->customer->id;
        $model->save();

        $product = (Cart\Product::where('product_id', $request->product_id)->where('cart_id', $model->id)->first()) ?: new Cart\Product;
        $product->product_id = $request->product_id;
        $product->quantity = ($product) ? ($product->quantity + $request->quantity) : $request->quantity;
        $product->cart_id = $model->id;
        $product->price = ($product) ? ($product->quantity * $productPrice) : $productPrice ;
        $product->save();

        $updateCart = Cart::find($model->id);
        $updateCart->total_amount = Cart\Product::whereCartId($model->id)->sum('price');
        $updateCart->save();
    } else {
        $model = (Cart::where('session_code', Session::getId())->first()) ?: new Cart;
        $model->session_code = Session::getId();
        $model->save();

        $product = (Cart\Product::where('cart_id', $model->id )->where('product_id', $request->product_id)->first()) ?: new Cart\Product;
        $product->product_id = $request->product_id;
        $product->quantity = ($product) ? ($product->quantity + $request->quantity) : $request->quantity;
        $product->cart_id = $model->id;
        $product->price = ($product) ? ($product->quantity * $productPrice) : $productPrice;
        $product->save();

        $updateCart = Cart::find($model->id);
        $updateCart->total_amount = Cart\Product::whereCartId($model->id)->sum('price');
        $updateCart->save();
    }

    $cart = (Auth::check() && Auth::user()->customer) ? Cart::where('customer_id', Auth::user()->customer->id)->first() : Cart::where('session_code', Session::getId())->first();
    $items = ($cart) ? Cart\Product::where('cart_id', $model->id)->get()->count() : 0;
    $totalCart = $cart->total_amount;

    return response()->json([
        'html' => view('partial.cart', compact('totalCart', 'items'))->render(),
        'message' => 'Product telah ditambahkan ke Keranjang belanja'
        ]);
}

public function postAjaxUpdateQuantity(Request $request)
{
    if(Auth::check()){
        $cart = Cart::where('customer_id', Auth::user()->customer->id)->first();
    }else{
        $cart = Cart::where('session_code', Session::getId())->first();
    }

    $model =  Cart\Product::where('cart_id', $cart->id)->where('product_id', $request->product_id)->first();
    $model->quantity = $request->quantity;
    $model->price = $request->quantity * \App\Site::pricelist($request->product_id)->total_price;
    $model->save();

    $rows = ($cart) ? Cart\Product::where('cart_id', $cart->id)->get() : [];
    $items = ($rows) ? count($rows) : 0;
    $cart->total_amount = Cart\Product::where('cart_id', $cart->id)->sum('price');
    $cart->update();
    $totalCart = $cart->total_amount;

    return response()->json([
        'message' => 'Update quantity successfull',
        'html' => view('partial.shopping-cart', compact('rows'))->render(),
        'cart' => view('partial.cart', compact('totalCart', 'items'))->render()
        ]);
}

public function getTermAndCondition()
{
    $row = Page::where('code', 'term-and-condition')->first();

    return view('shopping-cart.term-and-condition', compact('row'));
}

public function sendEmailNotification($datas) {
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
    if($datas->payment_method == 'Credit Card') {
        \Mail::send('emails.payment-notification', $data, function ($message) use ($data) {
            $message->from(Setting::whereCode('email')->whereType('admin')->first()->value);
            $message->subject("Payment Detail");
            $message->to($data['email']);
        });

        \Mail::send('emails.payment-notification-admin', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->subject("Payment Notification");
            $message->to(Setting::whereCode('email')->whereType('admin')->first()->value);
        });
    }else{
     \Mail::send('emails.order-notification', $data, function ($message) use ($data) {
        $message->from(Setting::whereCode('email')->whereType('admin')->first()->value);
        $message->subject("Order Notification");
        $message->to($data['email']);
    });
 }

}

}
