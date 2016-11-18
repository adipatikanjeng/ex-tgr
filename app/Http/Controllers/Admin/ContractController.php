<?php

namespace App\Http\Controllers\Admin;

class ContractController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Contract $model)
    {
        $this->model = $model;
        $this->sectionCode = 'contract';
        parent::__construct();
        $this->sectionUri = 'contracts';

        view()->share('title', 'Contracts');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew'];
        $this->fields = [
            ['name' => 'user->profile->rm_name', 'title' => 'EPC Name'],
            ['name' => 'name', 'title' => 'Contract Name'],
            ['name' => 'contract_number'],
            ['name' => 'email'],
            ['name' => 'status'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [];

        return parent::postAddedit();
    }
}
