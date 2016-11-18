<?php

namespace App\Http\Controllers\Admin;

use Request;

class CustomerController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Customer $model)
    {
        $this->model = $model;
        $this->sectionCode = 'customer';
        parent::__construct();
        $this->sectionUri = 'customers';

        view()->share('title', 'Customers');
    }

    public function getIndex()
    {

        $this->disabledActions = ['addNew', 'edit'];
        $this->fields = [
            ['name' => 'name', 'title' => 'Name'],
            ['name' => 'user->email', 'title' => 'email'],
            ['name' => 'address', 'title' => 'Address'],
            ['name' => 'city->name', 'title' => 'City'],
            ['name' => 'gender', 'title' => 'Gender'],
            ['name' => 'place_of_birth', 'title' => 'Place Of Birth'],
            ['name' => 'date_of_birth'],
            ['name' => 'telephone'],
            ['name' => 'merital_status'],
            ['name' => 'religion'],
            ['name' => 'id_number'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        return parent::postAddedit();
    }
}
