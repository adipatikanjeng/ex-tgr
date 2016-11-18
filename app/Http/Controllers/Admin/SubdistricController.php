<?php

namespace App\Http\Controllers\Admin;

class SubdistricController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Subdistrict $model)
    {
        $this->model = $model;
        $this->sectionCode = 'subdistrict';
        parent::__construct();
        $this->sectionUri = 'subdistricts';

        view()->share('title', 'Subdistricts');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'postal_code'],
            ['name' => 'name'],
            ['name' => 'city->name', 'title' => 'City Name']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'postal_code', 'city_id'];

        return parent::postAddedit();
    }
}
