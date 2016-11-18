<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Models\Product\Category', 'category_id');
    }

    public function price()
    {
        return $this->hasOne('App\Models\Product\Price', 'product_id');
    }

    public function pricelist()
    {
        return $this->hasOne('App\Models\Contract\Product\Pricelist', 'product_id');
    }
}
