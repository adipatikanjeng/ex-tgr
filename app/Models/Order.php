<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function status()
    {
        return $this->belongsTo('App\Models\Order\Status');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Order\Product', 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function partials()
    {
        return $this->hasMany('App\Models\Order\Partial', 'order_id');
    }
}
