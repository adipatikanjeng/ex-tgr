<?php

namespace App\Models\Shipping;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = 'shipping_fees';

    public function weightClass(){
    	return $this->belongsTo(App\Models\WeightClass::class);
    }

    public function volumeClass(){
    	return $this->belongsTo(App\Models\VolumeClass::class);
    }

    public function city(){
        return $this->belongsTo(\App\Models\City::class);
    }
}
