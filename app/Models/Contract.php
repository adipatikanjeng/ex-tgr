<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model {
    public function creditType() {
        return $this->belongsTo('App\Models\Contract\CreditType');
    }

    public function user() {
        return $this->belongsTo('App\Models\User\Epc');
    }

    public function pricelist() {
        return $this->hasOne('App\Models\Contract\Product\Pricelist', 'id');
    }

    public function product(){
        return $this->hasMany('App\Models\Contract\Product', 'contract_id');
    }

    public function branch() {
        return $this->belongsTo('App\Models\Branch');
    }
}
