<?php

namespace App\Models\Contract;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'contract_products';

	public function product()
	{
		return $this->belongsTo('App\Models\Product', 'product_id');
	}

	public function pricelist()
	{
		return $this->belongsTo('App\Models\Product\Pricelist', 'pricelist_id');
	}

	public function discount(){
		return $this->belongsTo('App\Models\Product\Discount', 'discount_code', 'code');
	}
}
