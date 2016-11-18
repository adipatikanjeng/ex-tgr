<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'rc_rep_master';

    public function scopeOrgChart($query, $repId)
    {
    	return $query->select(\DB::raw('*, TRIM(rm_current_position) as rm_current_position'))->where('rm_manager_id', $repId)->orderBy('rm_current_position', 'desc');
    }
}
