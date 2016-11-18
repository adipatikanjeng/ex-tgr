<?php

namespace App\Http\Controllers\Admin\Shipping;

class FeeController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Shipping\Fee $model)
    {
        $this->model = $model;
        $this->sectionCode = 'shipping_fee';
        parent::__construct();
        $this->sectionUri = 'shippings/fees';

        view()->share('title', 'Shipping Fees');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'city->name', 'title' => 'City'],
            ['name' => 'cost', 'title' => 'Cost']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
            'city_id', 'cost'
        ];

        return parent::postAddedit();
    }
}
