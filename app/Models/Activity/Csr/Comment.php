<?php

namespace App\Models\Activity\Csr;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'csr_activity_comments';

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

}
