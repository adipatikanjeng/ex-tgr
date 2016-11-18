<?php

namespace App\Models\Contract;

use Illuminate\Database\Eloquent\Model;

class OwnedProduct extends Model {
	protected $table = 'contract_owned_products';

	public function product() {
		return $this->belongsTo('App\Models\Product', 'product_id');
	}
}
