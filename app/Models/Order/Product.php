<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'order_products';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function order() {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
}
