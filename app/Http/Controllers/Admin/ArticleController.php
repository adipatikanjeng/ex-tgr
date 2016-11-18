<?php

namespace App\Http\Controllers\Admin;

use Request;

class ArticleController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Article $model)
    {
        $this->model = $model;
        $this->sectionCode = 'article';
        parent::__construct();
        $this->sectionUri = 'articles';

        view()->share('title', 'Articles');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'category->name', 'title' => 'Category'],
            ['name' => 'title', 'title' => 'Title Id'],
            ['name' => 'title_locale_id', 'title' => 'Title En'],
            ['name' => 'img', 'image' => 100],
            ['name' => 'is_display']
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['category_id', 'title', 'title_locale_id','short_desc', 'short_desc_locale_id', 'content', 'content_locale_id', 'is_display'];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_article', $this->model);
            $this->customInputs = ['img' => $img];
        }

        return parent::postAddedit();
    }
}
