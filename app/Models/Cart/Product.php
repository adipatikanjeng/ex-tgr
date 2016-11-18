<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'cart_products';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function scopeOfOrderCategory($query)
    {
        return $query->join('products', 'cart_products.product_id', '=', 'products.id')
        ->select(\DB::raw('*, SUM(cart_products.price) as total_price'))
        ->groupBy('products.category_id');
    }

    public function scopeOfWeightVolume($query){
        return $query->join('products', 'cart_products.product_id', '=', 'products.id')
        ->selectRaw('SUM(products.weight * cart_products.quantity) as total_weight, SUM(products.volume * cart_products.quantity) as total_volume')
        ->groupBy('cart_products.cart_id');
    }
}
