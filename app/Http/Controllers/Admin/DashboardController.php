<?php
namespace App\Http\Controllers\Admin;
use App\Models\Customer;
use App\Models\Order\Partial;

class DashboardController extends Controller {
	public function __construct() {
		$this->sectionCode = 'dashboard';
		parent::__construct();
	}

	public function getIndex() {
		$customers = Customer::all();
		$orders = Partial::orderBy('created_at', 'desc');
		$orders = (\Request::input('search')) ? ($orders->where('order_number', \Request::input('search'))) : $orders;
		$orders = $orders->paginate(10);
		return view('admin::dashboard', compact('customers', 'orders'));
	}
}
