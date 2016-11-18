<?php

namespace App\Models\Contract;

use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
    protected $table = 'contract_group_product_pricelists';

    public function groupPricelist()
    {
        return $this->hasMany('App\Models\Product\GroupPricelist', 'code', 'group_pricelist_code');
    }
}
