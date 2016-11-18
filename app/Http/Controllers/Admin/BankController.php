<?php

namespace App\Http\Controllers\Admin;

class BankController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Bank $model)
    {
        $this->model = $model;
        $this->sectionCode = 'bank';
        parent::__construct();
        $this->sectionUri = 'banks';

        view()->share('title', 'Banks');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'account_number'],
            ['name' => 'account_name'],
            ['name' => 'branch'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'account_number', 'branch', 'account_name'];

        return parent::postAddedit();
    }
}
