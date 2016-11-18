<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function subject()
    {
        return $this->belongsTo('\App\Models\Subject', 'subject_id');
    }

    public function source()
    {
        return $this->belongsTo('\App\Models\Source', 'source_id');
    }
}
