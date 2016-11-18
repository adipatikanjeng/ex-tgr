<?php

namespace App\Models\Order\Partial;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'order_partial_products';
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function orderPartial() {
        return $this->belongsTo('App\Models\Order\Partial', 'order_partial_id');
    }
}
