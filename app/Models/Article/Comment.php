<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'article_comments';

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function article()
    {
        return $this->belongsTo('\App\Models\Article', 'article_id');
    }
}
