<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Contract;
use App\Models\Contract\Child;
use App\Models\Contract\OwnedProduct;
use App\Models\Contract\Product as ContractProduct;
use App\Models\User\SalesService;
use App\Models\User\SalesService\Profile;
use App\Models\Contract\GroupProduct;
use Auth;
use Carbon;
use Illuminate\Http\Request;

class SalesServiceController extends Controller {
	public function __construct() {
		$this->middleware('auth.sales');
	}
	public function getIndex(Contract $contract, Request $request) {
		$rows = $contract->where('branch_id', Auth::user()->ss->profile->branch_id)
			->orWhere(function ($query) {
                	$query->where('status', 'Released')
                	->where('status', 'Sent to Ho');
            });

		($request->get('start_date') == null) ?: $rows->where('created_at', '>=', Carbon::parse($request->get('start_date'))->format('Y-m-d h-i-s'));
		($request->get('end_date') == null) ?: $rows->where('created_at', '<=', Carbon::parse($request->get('end_date'))->format('Y-m-d h-i-s'));
		($request->get('status') == null) ?: $rows->where('status', $request->get('status'));
		$rows = $rows->paginate(10);
		return view('sales-service.index', compact('rows'));
	}

	public function getProfile() {
		$model = new Profile;
		$row = $model->where('user_id', Auth::user()->ss->id)->first();
		$branches = Branch::lists('name', 'id');

		return view('sales-service.profile', compact('row', 'branches'));
	}

	public function postProfile(Request $request) {
		$this->validate($request, [
			'password' => 'confirmed',
			'name' => 'required',
			'email' => 'required',
		]);

		$model = Profile::where('user_id', Auth::user()->ss->id)->first();
		$model->name = $request->name;
		$model->email = $request->email;
		$model->user_id = Auth::user()->id;
		$model->branch_id = $request->branch_id;
		$model->update();
		$user = SalesService::find(Auth::user()->id);
		if ($request->password && ($request->password == $request->password_confirmation)) {
			$user->password = $request->password;
		}
		$user->email = strtoupper($request->username);
		$user->save();

		return redirect()->back()->withInput()->with('message', trans('global.change-profile-success'));
	}

	public function getSendToHo($id) {
		Contract::where('id', $id)->update(['status' => 'Sent to Ho']);

		return redirect()->back()->with('message', 'Data berhasil dikirim!');
	}

	public function getReject($id) {
		Contract::where('id', $id)->update(['status' => 'Rejected']);

		return redirect()->back()->with('message', 'Data berhasil dikirim!');
	}
	
	public function getInvoice(Contract $contract, $id) {
		$row = $contract->find($id);
		$products = ContractProduct::where('contract_id', $id)->get();
		$productGroups = (GroupProduct::where('contract_id', $id)->first()) ? GroupProduct::where('contract_id', $id)->first()
			->groupPricelist()
			->groupBy('product_code')
			->get() : [];
		$children = Child::where('contract_id', $id)->get();
		$ownedProducts = OwnedProduct::where('contract_id', $id)->get();

		return \PDF::loadView('account.invoice', compact('row', 'products', 'children', 'ownedProducts', 'productGroups'))->download('kontrak-pembelian_' . $row->contract_number . '' . '_' . date('d-m-Y') . '.pdf');
	}
	
	public function getReview(Contract $contract, $id) {
		$row = $contract->find($id);
		$products = ContractProduct::where('contract_id', $id)->get();
		$children = Child::where('contract_id', $id)->get();
		$ownedProducts = OwnedProduct::where('contract_id', $id)->get();
		$productGroups = (GroupProduct::where('contract_id', $id)->first()) ? GroupProduct::where('contract_id', $id)->first()
			->groupPricelist()
			->groupBy('product_code')
			->get() : [];

		return view('sales-service.review', compact('row', 'products', 'children', 'ownedProducts', 'productGroups'));
	}
}
