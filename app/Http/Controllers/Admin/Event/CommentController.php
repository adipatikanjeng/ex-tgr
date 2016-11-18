<?php

namespace App\Http\Controllers\Admin\Event;

class CommentController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Event\Comment $model)
    {
        $this->model = $model;
        $this->sectionCode = 'event_comment';
        parent::__construct();
        $this->sectionUri = 'events/comments';

        view()->share('title', 'Event Comments');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
            ['name' => 'event->name', 'title' => 'Event Name'],
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
