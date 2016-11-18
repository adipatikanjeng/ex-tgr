<?php

namespace App\Http\Controllers\Admin;

use Request;

class ProductController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Product $model)
    {
        $this->model = $model;
        $this->sectionCode = 'product';
        parent::__construct();
        $this->sectionUri = 'products';

        view()->share('title', 'Products');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'code', 'title' => 'Code'],
            ['name' => 'name', 'title' => 'Name'],
            ['name' => 'category->name', 'title' => 'Category'],
            ['name' => 'short_desc', 'title' => 'Short Description'],
            ['name' => 'img', 'image' => 100],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
        'category_id', 'code', 'name', 'short_desc', 'short_desc_locale_id', 'weight', 'volume',
        'desc', 'desc_locale_id', 'stock', 'is_sale', 'is_popular', 'is_active', 'is_e_commerce', 'youtube_link', 'is_group', 'is_kp_online'
        ];
        if (Request::file('img')) {
            $img = \Site::handleUpload('img', 'img_product', $this->model);
            $this->customInputs = ['img' => $img];
        }

        return parent::postAddedit();
    }
}
