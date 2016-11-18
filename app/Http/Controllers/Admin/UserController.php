<?php

namespace App\Http\Controllers\Admin;

use Request;

class UserController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\User\Epc $model)
    {
        $this->model = $model;
        $this->sectionCode = 'user';
        parent::__construct();
        $this->sectionUri = 'users';

        view()->share('title', 'Users');
    }

    public function getIndex()
    {

        $this->disabledActions = ['addNew', 'edit', 'delete'];
        $this->fields = [
            ['name' => 'profile->rm_name', 'title' => 'Name'],
            ['name' => 'email', 'title' => 'username'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        return parent::postAddedit();
    }
}
