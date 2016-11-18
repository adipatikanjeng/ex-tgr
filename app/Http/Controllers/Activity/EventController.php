<?php

namespace App\Http\Controllers\Activity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Event\Comment;
use Auth;
use App;

class EventController extends Controller
{
    public function getIndex()
    {
        return redirect(App::getLocale().'/activities/events/next-event');
    }

    public function getNextEvent($detail = null, $id = null)
    {
        return view('activity.event', [
            'rows' => Event::where('start_date', '<=', date('Y-m-d'))->where('finish_date', '>=', date('Y-m-d'))->get(),
            ]);
    }

    public function getHistory($detail = null, $id = null)
    {
        return view('activity.event', [
            'rows' => Event::where('finish_date', '<', date('Y-m-d'))->get(),
            ]);
    }

    public function getEventDetail($id, $name)
    {
        $row = Event::find($id);
        $comments = Comment::whereEventId($id)->whereIsDisplay('Y')->get();

        return view('activity.event.detail', compact('row', 'comments'));
    }

    public function postComment(Request $request)
    {
        $model = new Comment();
        $model->user_id = Auth::user()->id;
        $model->event_id = $request->input('event_id');
        $model->content = $request->input('content');
        $model->save();

        return redirect()->back()->with('message', 'Your comment successfully sent and will be displayed after approved by admin .');
    }
}
