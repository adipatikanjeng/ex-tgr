<?php

namespace App\Http\Controllers\Admin\Gallery;

class CommentController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Gallery\Comment $model)
    {
        $this->model = $model;
        $this->sectionCode = 'gallery_comment';
        parent::__construct();
        $this->sectionUri = 'galleries/comments';

        view()->share('title', 'Gallery Comments');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
            ['name' => 'gallery->title', 'title' => 'Gallery Title'],
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
