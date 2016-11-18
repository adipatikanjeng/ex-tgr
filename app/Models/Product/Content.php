<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $table = 'product_contents';

	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}
}
