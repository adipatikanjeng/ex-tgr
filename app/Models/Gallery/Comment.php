<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'gallery_comments';

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }
    public function gallery()
    {
        return $this->belongsTo('\App\Models\Gallery', 'gallery_id');
    }
}
