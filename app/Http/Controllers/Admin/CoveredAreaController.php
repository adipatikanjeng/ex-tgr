<?php

namespace App\Http\Controllers\Admin;

class CoveredAreaController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\CoveredArea $model)
    {
        $this->model = $model;
        $this->sectionCode = 'covered-area';
        parent::__construct();
        $this->sectionUri = 'covered-areas';

        view()->share('title', 'Covered Area');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'postal_code'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'postal_code'];

        return parent::postAddedit();
    }
}
