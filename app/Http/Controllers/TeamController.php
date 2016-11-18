<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\JoinTeam;
use Illuminate\Http\Request;

class TeamController extends Controller
{
  public function getIndex()
  {
    $model = new Page();
    $row = $model->where('code', 'join-our-team')->first();

    return view('team', compact('row'));
  }

  public function postIndex(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email',
      'city' => 'required',
      'telephone' => 'required',
      'g-recaptcha-response' => 'required|recaptcha',
      ]);

    $model = new JoinTeam;
    $model->name = $request->name;
    $model->email = $request->email;
    $model->city = $request->city;
    $model->telephone = $request->telephone;
    $model->comment = $request->comment;
    $model->save();

    $data = $model->toArray();

    \Mail::send('emails.join-our-team', $data, function ($message) use ($data) {

      $message->from($data['email']);
      $message->subject("Join Our Team");
      $message->to(\Webarq\Site\Models\Setting::whereCode('email')->whereType('admin')->first()->value);
    });

    return redirect()->back()->with('message', trans('global.your-message-has-been-sent'));
  }
}
