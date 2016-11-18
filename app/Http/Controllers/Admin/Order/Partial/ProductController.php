<?php

namespace App\Http\Controllers\Admin\Order\Partial;

use Request;

class ProductController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Order\Partial\Product $model)
    {
        $this->model = $model;
        $this->sectionCode = 'order_partial_product';
        parent::__construct();
        $this->sectionUri = 'orders/partials/products';

        view()->share('title', 'Partial Products');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'edit', 'delete'];
        $this->fields = [
            ['name' => 'orderPartial->order_number', 'title' =>'Order Number'],
            ['name' => 'product->name', 'title' => 'Product'],
            ['name' => 'quantity'],
            ['name' => 'product_pricelist_code', 'title' => 'Pricelist Code'],
            ['name' => 'total_price']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        return parent::postAddedit();
    }
}
