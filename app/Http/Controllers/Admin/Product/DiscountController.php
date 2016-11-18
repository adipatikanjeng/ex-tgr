<?php

namespace App\Http\Controllers\Admin\Product;

class DiscountController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Product\Discount $model)
    {
        $this->model = $model;
        $this->sectionCode = 'product_discount';
        parent::__construct();
        $this->sectionUri = 'products/discounts';

        view()->share('title', 'Products Discounts');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'code'],
            ['name' => 'discount_desc', 'title' => 'Description'],
            ['name' => 'product->name', 'title' => 'Product Name'],
            ['name' => 'discount', 'title' => 'Total Discount (%)'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
            'product_code', 'code', 'discount_desc', 'min_amount', 'max_amount',
            'discount_type', 'discount'
        ];

        return parent::postAddedit();
    }
}
