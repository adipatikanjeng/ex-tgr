<?php

namespace App\Http\Controllers\Admin\Article;

class CommentController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Article\Comment $model)
    {
        $this->model = $model;
        $this->sectionCode = 'article_comment';
        parent::__construct();
        $this->sectionUri = 'articles/comments';

        view()->share('title', 'Article Comments');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
            ['name' => 'article->title', 'title' => 'Article Title'],
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
