<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'event_comments';

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function event()
    {
        return $this->belongsTo('\App\Models\Event', 'event_id');
    }
}
