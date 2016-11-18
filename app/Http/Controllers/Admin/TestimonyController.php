<?php

namespace App\Http\Controllers\Admin;

use Request;

class TestimonyController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Testimony $model)
    {
        $this->model = $model;
        $this->sectionCode = 'testimony';
        parent::__construct();
        $this->sectionUri = 'testimonies';

        view()->share('title', 'Testimonies');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'content', 'title' => 'Title Id'],
            ['name' => 'content_locale_id', 'title' => 'Title En'],
            ['name' => 'img', 'image' => 100],
            ['name' => 'is_active'],
            ['name' => 'order'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'content', 'content_locale_id', 'is_active', 'order'];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_testimony', $this->model);
            $this->customInputs = ['img' => $img];
        }

        return parent::postAddedit();
    }
}
