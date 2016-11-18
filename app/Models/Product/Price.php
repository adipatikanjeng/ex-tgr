<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'product_prices';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
