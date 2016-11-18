<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Article\Category;
use App\Models\Article\Comment;
use Auth;
use App;

class ArticleController extends Controller
{
    public function getIndex()
    {
        return redirect(App::getLocale().'/articles/child-development');
    }

    public function getCategory($permalink = null)
    {
        $category = Category::where('permalink', $permalink)->first();

        $model = new Article();
        $rows = $model->where('is_display', 'Y')->where('category_id', $category->id)->paginate(3);

        return view('article.index', compact('rows'));
    }

    public function getDetail($permalink, $id)
    {
        $model = new Article();
        $row = $model->find($id);

        $comments = Comment::where('article_id', $id)->where('is_display', 'Y');

        return view('article.detail', compact('row', 'comments'));
    }

    public function postComment(Request $request)
    {
        $model = new Comment();
        $model->user_id = Auth::user()->id;
        $model->article_id = $request->input('article_id');
        $model->content = $request->input('content');
        $model->save();

        return redirect()->back()->with('message', 'Your comment successfully sent and will be displayed after approved by admin .');
    }
}
