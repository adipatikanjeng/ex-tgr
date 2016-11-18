<?php

namespace App\Models\User\SalesService;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'user_sales_services';

    public function user(){
    	return $this->hasOne('App\User', 'id', 'user_id');
    }
}
