<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products()
    {
        return $this->hasMany('App\Models\Cart\Product', 'cart_id');
    }

    public function product()
    {
        return $this->belogsTo('App\Models\Cart\Product', 'cart_id');
    }
}
