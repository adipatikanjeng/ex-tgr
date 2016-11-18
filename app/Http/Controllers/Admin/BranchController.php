<?php

namespace App\Http\Controllers\Admin;

class BranchController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Branch $model)
    {
        $this->model = $model;
        $this->sectionCode = 'branch';
        parent::__construct();
        $this->sectionUri = 'branches';

        view()->share('title', 'Branches');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'code'],
            ['name' => 'lat', 'title' => 'Latitude'],
            ['name' => 'long', 'title' => 'Longitude'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'code', 'lat', 'long', 'desc'];

        return parent::postAddedit();
    }
}
