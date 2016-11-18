<?php

namespace App\Http\Controllers\Admin;

class ProvinceController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Province $model)
    {
        $this->model = $model;
        $this->sectionCode = 'province';
        parent::__construct();
        $this->sectionUri = 'provinces';

        view()->share('title', 'Provinces');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name'];

        return parent::postAddedit();
    }
}
