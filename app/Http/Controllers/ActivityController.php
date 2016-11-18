<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Activity\Csr;
use App\Models\Activity\Csr\Comment;
use App;
use Auth;

class ActivityController extends Controller
{
    public function getIndex()
    {
        return redirect(App::getLocale().'/activities/events');
    }
    public function getCsr()
    {
        $model = new Csr;
        $rows = $model->paginate(5);

        return view('activity/csr', compact('rows'));
    }

    public function getCsrDetail($id)
    {
        $model = new Csr;
        $row = $model->find($id);
        $comments = Comment::where('csr_activity_id', $id)->where('is_display', 'Y')->paginate(5);

        return view('activity.csr.detail', compact('row', 'comments'));
    }
    public function postComment(Request $request)
    {
        $model = new Comment();
        $model->user_id = Auth::user()->id;
        $model->csr_activity_id = $request->input('csr_activity_id');
        $model->content = $request->input('content');
        $model->save();

        return redirect()->back()->with('message', 'Your comment successfully sent and will be displayed after approved by admin .');
    }
}
