<?php

namespace App\Http\Controllers\Admin\Activity\Csr;

class CommentController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Activity\Csr\Comment $model)
    {
        $this->model = $model;
        $this->sectionCode = 'csr-activity_comment';
        parent::__construct();
        $this->sectionUri = 'csr-activities/comments';

        view()->share('title', 'Csr Activities Comments');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
            ['name' => 'activity->title', 'title' => 'Article Title'],
            ['name' => 'user->email', 'title' => 'User'],
            ['name' => 'content'],
            ['name' => 'is_display', 'title' => 'Display'],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['is_display'];

        return parent::postAddedit();
    }
}
