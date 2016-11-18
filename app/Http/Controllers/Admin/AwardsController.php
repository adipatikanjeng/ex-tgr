<?php

namespace App\Http\Controllers\Admin;

use Request;

class AwardsController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Awards $model)
    {
        $this->model = $model;
        $this->sectionCode = 'awards';
        parent::__construct();
        $this->sectionUri = 'awards';

        view()->share('title', 'Awards');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'title', 'title' => 'Title Id'],
            ['name' => 'title_locale_id', 'title' => 'Title En'],
            ['name' => 'is_publish'],
            ['name' => 'img', 'image' => 100],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['title', 'title_locale_id', 'content', 'content_locale_id', 'is_publish'];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_awards', $this->model);
            $this->customInputs = ['img' => $img];
        }

        return parent::postAddedit();
    }
}
