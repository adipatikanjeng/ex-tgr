<?php

namespace App\Http\Controllers\Admin;

use Request;

class HeaderController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Header $model)
    {
        $this->model = $model;
        $this->sectionCode = 'header';
        parent::__construct();
        $this->sectionUri = 'headers';

        view()->share('title', 'Headers');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
            ['name' => 'img', 'title' => 'Image', 'image' => 100],
            ['name' => 'code'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_header', $this->model);
            $this->customInputs = ['img' => $img];
        }

        return parent::postAddedit();
    }
}
