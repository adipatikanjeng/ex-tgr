<?php

namespace App\Http\Controllers\Admin;

class PageController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Page $model)
    {
        $this->model = $model;
        $this->sectionCode = 'page';
        parent::__construct();
        $this->sectionUri = 'pages';

        view()->share('title', 'Pages');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
            ['name' => 'title', 'title' => 'Title Id'],
            ['name' => 'title_locale_id', 'title' => 'Title En'],
            ['name' => 'code'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['title', 'title_locale_id', 'content', 'content_locale_id'];

        return parent::postAddedit();
    }
}
