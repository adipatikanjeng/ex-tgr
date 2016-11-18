<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'gallery_images';

    public function gallery()
    {
        return $this->belongsTo('\App\Models\Gallery', 'gallery_id');
    }
}
