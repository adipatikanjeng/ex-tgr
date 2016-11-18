<?php

namespace App\Http\Controllers\Admin;

class RangeDiscountController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\RangeDiscount $model)
    {
        $this->model = $model;
        $this->sectionCode = 'range-discount';
        parent::__construct();
        $this->sectionUri = 'range-discounts';

        view()->share('title', 'Range Discounts');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'code'],
            ['name' => 'discount_desc', 'title' => 'Description'],
            ['name' => 'discount', 'title' => 'Total Discount (%)'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
            'code', 'discount_desc', 'min_amount', 'max_amount',
            'discount_type', 'discount'
        ];

        return parent::postAddedit();
    }
}
