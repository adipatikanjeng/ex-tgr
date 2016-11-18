<?php

namespace App\Http\Controllers\Admin\Product;

class GroupPricelistController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Product\GroupPricelist $model)
    {
        $this->model = $model;
        $this->sectionCode = 'product_group-pricelist';
        parent::__construct();
        $this->sectionUri = 'products/group-pricelists';

        view()->share('title', 'Products Group Pricelist');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'code'],
            ['name' => 'desc'],
            ['name' => 'product->name', 'title' => 'Product Name'],
            ['name' => 'credit_installment_number'],
            ['name' => 'credit_investation_amount'],
            ['name' => 'cash_investation_amount'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
            'product_code', 'product_sequence_number', 'pricelist_code', 'credit_installment_number', 'credit_investation_amount', 'line_type',
            'product_quantity', 'cash_investation_amount', 'desc', 'code',
        ];

        return parent::postAddedit();
    }
}
