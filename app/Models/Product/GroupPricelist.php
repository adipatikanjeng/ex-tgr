<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class GroupPricelist extends Model
{
    protected $table = 'product_group_pricelists';

    public function product(){
        return $this->belongsTo('\App\Models\Product', 'product_code', 'code');
    }
}
