<?php

namespace App\Http\Controllers\Admin\Order;

use Request;

class ProductController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Order\Product $model)
    {
        $this->model = $model;
        $this->sectionCode = 'order_product';
        parent::__construct();
        $this->sectionUri = 'orders/products';

        view()->share('title', 'Orders Products');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'edit', 'delete'];
        $this->fields = [
            ['name' => 'order->order_number', 'title' =>'Order Number'],
            ['name' => 'product->name', 'title' => 'Product'],
            ['name' => 'quantity'],
            ['name' => 'total_price']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        return parent::postAddedit();
    }
}
