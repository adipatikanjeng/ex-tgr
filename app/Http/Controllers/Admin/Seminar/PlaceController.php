<?php

namespace App\Http\Controllers\Admin\Seminar;

class PlaceController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Seminar\Place $model)
    {
        $this->model = $model;
        $this->sectionCode = 'seminar_place';
        parent::__construct();
        $this->sectionUri = 'seminars/places';

        view()->share('title', 'Places');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name'];

        return parent::postAddedit();
    }
}
