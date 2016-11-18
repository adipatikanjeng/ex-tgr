<?php

namespace App\Http\Controllers\Admin\Article;

use Request;

class CategoryController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Article\Category $model)
    {
        $this->model = $model;
        $this->sectionCode = 'article_category';
        parent::__construct();
        $this->sectionUri = 'articles/categories';

        view()->share('title', 'Categories');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name', 'title' => 'Name En'],
            ['name' => 'name_locale_id', 'title' => 'Name Id']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['name', 'name_locale_id'];
        $this->customInputs = ['permalink' => str_slug(Request::input('name'))];

        return parent::postAddedit();
    }
}
