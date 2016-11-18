<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class SalesService extends Model
{
    protected $table = 'users';

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery()->where('user_type', 'SS');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\User\SalesService\Profile', 'user_id');
    }
}
