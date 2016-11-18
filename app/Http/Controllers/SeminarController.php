<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seminar\Topic;
use App\Models\Page;
use App\Models\Seminar\Join;
use App\Models\Seminar\Request as SeminarRequest;
use \Webarq\Site\Models\Setting;

class SeminarController extends Controller
{
    public function getIndex()
    {
        return redirect('seminars/request');
    }

    public function getRequest()
    {
        $model = new Page();
        $row = $model->where('code', 'request-seminar')->first();
        $seminarTopics = new Topic();
        $seminarTopics = $seminarTopics->get();

        return view('seminar', compact('row', 'seminarTopics'));
    }

    public function postRequest(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'topic_id' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
            ]);

        $model = new SeminarRequest;
        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->city = $request->input('city');
        $model->telephone = $request->input('telephone');
        $model->topic_id = $request->input('topic_id');
        $model->save();
        $data = $model->toArray();
        $data['topic'] = \App\Site::lang($model->topic->first(), 'name');

        \Mail::send('emails.request-for-seminar', $data, function ($message) use ($data) {

          $message->from($data['email']);
          $message->subject("Request For Seminar");
          $message->to(Setting::whereCode('email')->whereType('admin')->first()->value);
      });

        return redirect()->back()->with('message', trans('global.your-message-has-been-sent'));
    }
    public function postJoin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'place_id' => 'required',
            // 'g-recaptcha-response' => 'required|recaptcha',
            ]);

        $model = new Join();
        $model->name = $request->name;
        $model->event_id = $request->input('event_id');
        $model->place_id = $request->input('place_id');
        $model->email = $request->input('email');
        $model->telephone = $request->input('telephone');
        $model->save();

        $data = $model->toArray();
        $data['event'] = \App\Site::lang($model->event, 'name');
        $data['place'] = $model->place->name;

         \Mail::send('emails.join-seminar', $data, function ($message) use ($data) {

          $message->from($data['email']);
          $message->subject("Join Seminar");
          $message->to(Setting::whereCode('email')->whereType('admin')->first()->value);
      });

        return redirect()->back()->with('message', trans('global.your-message-has-been-sent'));
    }
}
