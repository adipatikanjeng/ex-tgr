<?php

namespace App\Http\Controllers\Admin\Home;

use Request;

class SliderController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Slider $model)
    {
        $this->model = $model;
        $this->sectionCode = 'home_slider';
        parent::__construct();
        $this->sectionUri = 'home/sliders';

        view()->share('title', 'Sliders');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'caption'],
            ['name' => 'caption_locale_id'],
            ['name' => 'img', 'image' => 100],
            ['name' => 'is_display'],
            ['name' => 'order'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['caption', 'caption_locale_id', 'is_display', 'order', 'url'];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_slider', $this->model);
            $this->customInputs = ['img' => $img];
        }

        return parent::postAddedit();
    }
}
