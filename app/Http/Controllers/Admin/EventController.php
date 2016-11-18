<?php

namespace App\Http\Controllers\Admin;

use Request;

class EventController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Event $model)
    {
        $this->model = $model;
        $this->sectionCode = 'event';
        parent::__construct();
        $this->sectionUri = 'events';

        view()->share('title', 'Events');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name', 'title' => 'Name En'],
            ['name' => 'img', 'image' => 100],
            ['name' => 'start_date', 'title' => 'Start Date'],
            ['name' => 'finish_date', 'title' => 'Finish Date'],
            ['name' => 'publish_date', 'title' => 'Publish Date'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'name_locale_id', 'short_desc', 'short_desc_locale_id', 'home_display', 'home_display_locale_id', 'desc', 'desc_locale_id', 'is_seminar'];
         $this->customInputs = [
         'start_date' => \Carbon::parse(\Input::get('start_date'))->format('Y-m-d'),
         'finish_date' => \Carbon::parse(\Input::get('finish_date'))->format('Y-m-d'),
         'publish_date' => \Carbon::parse(\Input::get('publish_date'))->format('Y-m-d')
         ];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_event', $this->model);
            $this->customInputs += ['img' => $img];
        }

        return parent::postAddedit();
    }
}
