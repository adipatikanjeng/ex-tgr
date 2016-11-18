<?php

namespace App\Http\Controllers\Admin;

class ContactController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Contact $model)
    {
        $this->model = $model;
        $this->sectionCode = 'contact';
        parent::__construct();
        $this->sectionUri = 'contacts';

        view()->share('title', 'Contact us');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'edit'];
        $this->fields = [
            ['name' => 'name'],
            ['name' => 'email'],
            ['name' => 'city'],
            ['name' => 'message'],
            ['name' => 'created_at', 'title' => 'Created Date'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = [];

        return parent::postAddedit();
    }
}
