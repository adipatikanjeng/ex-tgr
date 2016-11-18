<?php

namespace App\Http\Controllers\Admin\Contract;

class PricelistController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Product\Pricelist $model)
    {
        $this->model = $model;
        $this->sectionCode = 'contract_pricelist';
        parent::__construct();
        $this->sectionUri = 'contracts/pricelists';

        view()->share('title', 'Pricelist');
    }

    public function getIndex()
    {
        $this->disabledActions = [];
        $this->fields = [
            ['name' => 'code'],
            ['name' => 'desc'],
            ['name' => 'product->name'],
            ['name' => 'installment_number'],
            ['name' => 'dp_amount'],
            ['name' => 'installment_amount'],
            ['name' => 'total_price'],
            ['name' => 'sales_unit'],
            ['name' => 'sales_type'],
            ['name' => 'cash_value'],
            ['name' => 'commission'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [
            'code', 'desc', 'product_id', 'installment_number', 'dp_amount',
            'installment_amount', 'total_price', 'sales_unit', 'sales_type',
            'cash_value', 'commission'
        ];

        return parent::postAddedit();
    }
}
