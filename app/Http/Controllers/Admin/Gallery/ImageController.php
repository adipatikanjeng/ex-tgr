<?php

namespace App\Http\Controllers\Admin\Gallery;

use Request;

class ImageController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Gallery\Image $model)
    {
        $this->model = $model;
        $this->sectionCode = 'gallery_image';
        parent::__construct();
        $this->sectionUri = 'galleries/images';

        view()->share('title', 'Images');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'gallery->title', 'title' => 'Gallery Title'],
            ['name' => 'img', 'image' => 100],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['gallery_id'];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_glry_images', $this->model);
            $this->customInputs = ['img' => $img];
        }

        return parent::postAddedit();
    }
}
