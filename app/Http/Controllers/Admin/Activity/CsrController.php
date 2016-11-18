<?php

namespace App\Http\Controllers\Admin\Activity;

use Request;

class CsrController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Activity\Csr $model)
    {
        $this->model = $model;
        $this->sectionCode = 'csr-activity';
        parent::__construct();
        $this->sectionUri = 'csr-activities';

        view()->share('title', 'Csr Activities');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name', 'title' => 'Name En'],
            ['name' => 'name_locale_id', 'title' => 'Name Id'],
            ['name' => 'short_desc', 'title' => 'Short Description En'],
            ['name' => 'short_desc_locale_id', 'title' => 'Short Description Id'],
            ['name' => 'img', 'image' => 100],
            ['name' => 'publish_date', 'title' => 'Publish Date'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'name_locale_id', 'short_desc', 'short_desc_locale_id', 'desc', 'desc_locale_id'];
        $this->customInputs = ['publish_date' => \Carbon::parse(\Input::get('publish_date'))->format('Y-m-d')];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_csr', $this->model);
            $this->customInputs += ['img' => $img];
        }

        return parent::postAddedit();
    }
}
