<?php

namespace App\Http\Controllers\Admin\Product\Pricelist;

class SettingController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Product\Pricelist\Setting $model)
    {
        $this->model = $model;
        $this->sectionCode = 'product_pricelist_setting';
        parent::__construct();
        $this->sectionUri = 'products/pricelists/settings';

        view()->share('title', 'Products Pricelist Setting');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'pricelist_code'],
            ['name' => 'start_date'],
            ['name' => 'end_date'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['pricelist_code'];
        $this->customInputs = ['start_date' => \Carbon::parse(\Input::get('start_date'))->format('Y-m-d'),
         'end_date' => \Carbon::parse(\Input::get('end_date'))->format('Y-m-d')];

        return parent::postAddedit();
    }
}
