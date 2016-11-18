<?php

namespace App\Http\Controllers\Admin;

class SideMenuController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\SideMenu $model)
    {
        $this->model = $model;
        $this->sectionCode = 'side-menu';
        parent::__construct();
        $this->sectionUri = 'side-menus';

        view()->share('title', 'Side Menus');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
        ['name' => 'title', 'title' => 'Title Id'],
        ['name' => 'link_title'],
        ['name' => 'link'],
        ['name' => 'is_display'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['title', 'link_title', 'link', 'is_display'];
        if (\Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_sidemenu', $this->model);
            $this->customInputs = ['img' => $img];
        }

        return parent::postAddedit();
    }
}
