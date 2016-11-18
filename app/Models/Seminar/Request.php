<?php

namespace App\Models\Seminar;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'seminar_requests';

    public function topic()
    {
        return $this->belongsTo('\App\Models\Seminar\Topic', 'topic_id');
    }
}
