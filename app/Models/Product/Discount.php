<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\RangeDiscount;

class Discount extends Model
{
    protected $table = 'product_discounts';

    public function scopeMergeDiscount($query)
    {
        $rangeDiscounts = RangeDiscount::selectRaw('id, "t" as product_id, code, discount_desc, min_amount, max_amount, discount, discount_type, created_at, updated_at');
        return $query->selectRaw('*')->union($rangeDiscounts);
    }

    public function product(){
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }
}
