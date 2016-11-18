<?php

namespace App\Http\Controllers\Admin\Product;

class ContentController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Product\Content $model)
    {
        $this->model = $model;
        $this->sectionCode = 'product_content';
        parent::__construct();
        $this->sectionUri = 'products/contents';

        view()->share('title', 'Products Contents');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
        ['name' => 'product->name', 'title' => 'Product Name'],
        ['name' => 'type'],
        ['name' => 'content_image', 'image' => 100],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
        'type', 'product_id', 'content_words', 'content_words_locale_id'
        ];
        if (\Request::file('content_image')) {
            $img = \Site::handleUpload('content_image', 'img_prod_content', $this->model);
            $this->customInputs = ['content_image' => $img];
        }

        return parent::postAddedit();
    }
}
