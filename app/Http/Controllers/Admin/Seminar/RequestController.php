<?php

namespace App\Http\Controllers\Admin\Seminar;

use Request;

class RequestController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Seminar\Request $model)
    {
        $this->model = $model;
        $this->sectionCode = 'seminar_request';
        parent::__construct();
        $this->sectionUri = 'seminars/requests';

        view()->share('title', 'Request');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew'];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'email'],
            ['name' => 'city'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [];

        return parent::postAddedit();
    }
}
