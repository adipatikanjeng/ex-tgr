<?php

namespace App\Http\Controllers\Admin\Seminar;

use Request;

class TopicController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Seminar\Topic $model)
    {
        $this->model = $model;
        $this->sectionCode = 'seminar_topic';
        parent::__construct();
        $this->sectionUri = 'seminars/topics';

        view()->share('title', 'Topics');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'name_locale_id'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['desc_locale_id', 'desc', 'name', 'name_locale_id'];

        return parent::postAddedit();
    }
}
