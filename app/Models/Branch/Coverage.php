<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Model;

class Coverage extends Model
{
    protected $table = 'branch_coverages';

    public function city(){
    	return $this->belongsTo('\App\Models\City');
    }

    public function branch(){
    	return $this->belongsTo('\App\Models\Branch', 'branch_id');
    }
}
