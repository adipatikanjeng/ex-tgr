<?php

namespace App\Models\Shipping;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    protected $table = 'shipping_billing_addresses';

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
