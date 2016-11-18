<?php

namespace App\Http\Controllers\Admin;

use Request;

class GalleryController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Gallery $model)
    {
        $this->model = $model;
        $this->sectionCode = 'gallery';
        parent::__construct();
        $this->sectionUri = 'galleries';

        view()->share('title', 'Galleries');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'title', 'title' => 'Title Id'],
            ['name' => 'title_locale_id', 'title' => 'Title En'],
            ['name' => 'publish_date'],
            ['name' => 'img', 'image' => 100],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['title', 'title_locale_id', 'short_desc', 'short_desc_locale_id', 'desc', 'desc_locale_id', 'publish_date'];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_gallery', $this->model);
            $this->customInputs = ['img' => $img];
        }

        return parent::postAddedit();
    }
}
