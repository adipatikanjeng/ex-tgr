<?php

namespace App\Http\Controllers\Admin;

class SubjectController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Subject $model)
    {
        $this->model = $model;
        $this->sectionCode = 'subject';
        parent::__construct();
        $this->sectionUri = 'subjects';

        view()->share('title', 'Subjects');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'code'],
            ['name' => 'name'],
            ['name' => 'name_locale_id']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'name_locale_id'];
        $this->customInputs = ['code' => str_slug(\Request::get('name'))];

        return parent::postAddedit();
    }
}
