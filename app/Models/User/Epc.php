<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Epc extends Model
{
    protected $table = 'users';

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery()->where('user_type', 'EPC');
    }

    public function profile()
    {
        return $this->belongsTo('App\Models\Account\Profile', 'email', 'rm_rep_id');
    }
}
