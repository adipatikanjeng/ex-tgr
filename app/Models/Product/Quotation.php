<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = 'product_quotations';

    public function product(){
    	return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
