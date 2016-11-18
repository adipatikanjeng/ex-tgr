<?php

namespace App\Http\Controllers\Admin\Seminar;

class JoinController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Seminar\Join $model)
    {
        $this->model = $model;
        $this->sectionCode = 'seminar_join';
        parent::__construct();
        $this->sectionUri = 'seminars/joins';

        view()->share('title', 'Joins');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew'];
        $this->fields = [
            ['name' => 'place->name', 'title' => 'Title'],
            ['name' => 'email'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [];

        return parent::postAddedit();
    }
}
