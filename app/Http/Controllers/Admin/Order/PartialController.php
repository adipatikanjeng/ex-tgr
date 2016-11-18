<?php

namespace App\Http\Controllers\Admin\Order;

use Request;

class PartialController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Order\Partial $model)
    {
        $this->model = $model;
        $this->sectionCode = 'order_partial';
        parent::__construct();
        $this->sectionUri = 'orders/partials';

        view()->share('title', 'Orders');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete', 'edit'];
        $this->fields = [
            ['name' => 'order->order_number', 'title' =>'Order Parent'],
            ['name' => 'order_number'],
            ['name' => 'order->customer->name', 'title' => 'Customer Name'],
            ['name' => 'shipping_amount', 'title' => 'Shipping Amount'],
            ['name' => 'total_amount']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        return parent::postAddedit();
    }
}
