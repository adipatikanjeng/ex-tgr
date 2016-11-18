<?php

namespace App\Http\Controllers\Admin\User;

use Request;
use App\User;

class SalesServiceController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\User\SalesService\Profile $model)
    {
        $this->model = $model;
        $this->sectionCode = 'user_sales-service';
        parent::__construct();
        $this->sectionUri = 'users/sales-services';

        view()->share('title', 'Users');
    }

    public function getIndex()
    {

        $this->disabledActions = [];
        $this->fields = [
        ['name' => 'name', 'title' => 'Name'],
        ['name' => 'user->email', 'title' => 'Username'],
        ['name' => 'email', 'title' => 'Email'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['email', 'name', 'branch_id'];
        $user = (\Input::get('user_id')) ? User::find(\Input::get('user_id')) : new User;
        $user->email = strtoupper(\Input::get('username'));
        (\Input::get('password')!= "") ? $user->password = md5(\Input::get('password')) : "";
        $user->user_type = 'SS';
        $user->save();

        $this->customInputs = ['user_id' => $user->id];

        return parent::postAddedit();
    }

}
