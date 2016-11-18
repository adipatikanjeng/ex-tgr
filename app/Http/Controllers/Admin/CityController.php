<?php

namespace App\Http\Controllers\Admin;

class CityController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\City $model)
    {
        $this->model = $model;
        $this->sectionCode = 'city';
        parent::__construct();
        $this->sectionUri = 'cities';

        view()->share('title', 'Cities');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'province->name', 'title' => 'Province'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'province_id'];

        return parent::postAddedit();
    }
}
