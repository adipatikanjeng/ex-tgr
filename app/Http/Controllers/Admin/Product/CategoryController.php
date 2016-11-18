<?php

namespace App\Http\Controllers\Admin\Product;

use Request;

class CategoryController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Product\Category $model)
    {
        $this->model = $model;
        $this->sectionCode = 'product_category';
        parent::__construct();
        $this->sectionUri = 'products/categories';

        view()->share('title', 'Categories');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'name', 'title' => 'Name'],
            ['name' => 'short_desc', 'title' => 'Short Description'],
            ['name' => 'img', 'image' => 100],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {

        $this->inputs = ['name', 'name_locale_id', 'desc', 'desc_locale_id', 'short_desc_locale_id', 'short_desc'];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_prod_ctgry', $this->model);
            $this->customInputs = ['img' => $img];
        }
        $this->customInputs += ['permalink' => str_slug(Request::input('name'))];

        return parent::postAddedit();
    }
}
