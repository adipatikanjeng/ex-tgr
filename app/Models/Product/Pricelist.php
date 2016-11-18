<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model {
	protected $table = 'product_pricelists';

	public function scopeProductList($query, $productIds) {
		return $query->join('products', 'product_pricelists.product_id', '=', 'products.id')
			->selectRaw('*, products.name as name, product_pricelists.total_price as total_price')
			->whereIn('product_id', $productIds)->groupBy('products.id');
	}

	public function product(){
		return ($this->belongsTo(\App\Models\Product::class, 'product_code', 'code')) ?: null;
	}

	public function contractProduct(){
		return $this->belongsTo(\App\Models\Contract\Product::class, 'pricelist_id');
	}
}
