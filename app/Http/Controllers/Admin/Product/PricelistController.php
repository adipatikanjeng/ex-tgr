<?php

namespace App\Http\Controllers\Admin\Product;

class PricelistController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Product\Pricelist $model)
    {
        $this->model = $model;
        $this->sectionCode = 'product_pricelist';
        parent::__construct();
        $this->sectionUri = 'products/pricelists';

        view()->share('title', 'Products Pricelist');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'code'],
            ['name' => 'desc'],
            ['name' => 'product->name', 'title' => 'Product Name'],
            ['name' => 'total_price', 'title' => 'Total Price'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
            'product_code', 'dp_amount', 'installment_number', 'installment_amount', 'total_price',
            'cash_value', 'commission', 'desc', 'code', 'su_ch_sales', 'su_cr_sales',
        ];

        return parent::postAddedit();
    }
}
