<?php

namespace App\Http\Controllers\Admin;

use Request;

class OrderController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Order $model)
    {
        $this->model = $model;
        $this->sectionCode = 'order';
        parent::__construct();
        $this->sectionUri = 'orders';

        view()->share('title', 'Orders');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
            ['name' => 'order_number'],
            ['name' => 'customer->name', 'title' => 'Customer Name'],
            ['name' => 'shipping_amount', 'title' => 'Shipping Amount'],
            ['name' => 'total_amount'],
            ['name' => 'status->name', 'title' => 'Status'],
            ['name' => 'payment_method']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['status_id'];
       return parent::postAddedit();
    }
}
