<?php

namespace App\Models\Seminar;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $table = 'seminar_joins';

    public function place()
    {
        return $this->belongsTo('\App\Models\Seminar\Place', 'place_id');
    }

    public function event()
    {
    	return $this->belongsTo('\App\Models\Event', 'event_id');
    }
}
