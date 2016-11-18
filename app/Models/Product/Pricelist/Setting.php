<?php

namespace App\Models\Product\Pricelist;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
	protected $table = 'product_pricelist_settings';

	public function pricelist() {
		return $this->belongsTo('\App\Models\Product\Pricelist');
	}
}
