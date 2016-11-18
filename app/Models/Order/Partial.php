<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Partial extends Model {
	protected $table = 'order_partials';

	public function scopeOfOrder($query, $orderNumberGroup) {
		return $query->join('orders', 'orders.id', '=', 'order_groups.order_id')
			->select(\DB::raw('*, SUM(shipping_amount) as shipping_amount, SUM(total_amount) as total_amount'))
			->where('orders.order_number', $orderNumberGroup)
			->groupBy('order_groups.order_number');
	}

	public function order() {
		return $this->belongsTo('App\Models\Order', 'order_id');
	}

}
