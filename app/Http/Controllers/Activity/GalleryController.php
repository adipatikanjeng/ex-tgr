<?php

namespace App\Http\Controllers\Activity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Auth;

class GalleryController extends Controller
{
    public function getIndex()
    {
       return view('activity.gallery', [
            'rows' => Gallery::all(),
            ]);
    }

    public function getGalleryDetail($id, $name)
    {
        $row = Gallery::find($id);
        $comments = Gallery\Comment::whereGalleryId($id)->whereIsDisplay('Y')->get();

        return view('activity.gallery.detail', compact('row', 'comments'));
    }

    public function postComment(Request $request)
    {
        $model = new Gallery\Comment();
        $model->user_id = Auth::user()->id;
        $model->gallery_id = $request->input('gallery_id');
        $model->content = $request->input('content');
        $model->save();

        return redirect()->back()->with('message', 'Your comment successfully sent and will be displayed after approved by admin .');
    }

}
