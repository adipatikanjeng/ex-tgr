<?php

namespace App\Models\Shipping;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'shipping_addresses';
    public function fee()
    {
        return $this->belongsTo('App\Models\Shipping\Fee', 'city_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
