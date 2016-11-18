<?php

namespace App\Http\Controllers\Admin;

class SourceController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Source $model)
    {
        $this->model = $model;
        $this->sectionCode = 'source';
        parent::__construct();
        $this->sectionUri = 'sources';

        view()->share('title', 'Sources');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'name_locale_id']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'name_locale_id'];

        return parent::postAddedit();
    }
}
