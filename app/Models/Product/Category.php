<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'product_categories';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
