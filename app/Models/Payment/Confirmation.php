<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    protected $table = 'payment_confirmations';

    public function bank()
    {
        return $this->belongsTo('\App\Models\Bank');
    }

    public function order()
    {
    	return $this->belongsTo('\App\Models\Order', 'order_number', 'order_number');
    }
}
