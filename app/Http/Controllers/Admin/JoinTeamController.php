<?php

namespace App\Http\Controllers\Admin;

class JoinTeamController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\JoinTeam $model)
    {
        $this->model = $model;
        $this->sectionCode = 'join-team';
        parent::__construct();
        $this->sectionUri = 'join-teams';

        view()->share('title', 'Join Teams');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew'];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'email'],
            ['name' => 'city'],
            ['name' => 'telephone'],
            ['name' => 'comment'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [];

        return parent::postAddedit();
    }
}
