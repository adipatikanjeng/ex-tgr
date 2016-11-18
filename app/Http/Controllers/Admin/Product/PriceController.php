<?php

namespace App\Http\Controllers\Admin\Product;

class PriceController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Product\Price $model)
    {
        $this->model = $model;
        $this->sectionCode = 'product_price';
        parent::__construct();
        $this->sectionUri = 'products/prices';

        view()->share('title', 'Products Prices');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'product->name', 'title' => 'Product Name'],
            ['name' => 'total_price', 'title' => 'Total Price'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
            'product_id', 'dp_amount', 'installment', 'amount_installment', 'total_price',
            'cash_value', 'commission', 'sales_unit', 'sales_type',
        ];

        return parent::postAddedit();
    }
}
