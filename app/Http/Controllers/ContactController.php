<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Source;
use App\Models\Subject;
use App\Models\Contact;

class ContactController extends Controller
{
    public function getIndex()
    {
        $subjects = Subject::lists('name_locale_id', 'id');
        $sources = Source::lists('name_locale_id', 'id');

        return view('contact.index', compact('subjects', 'sources'));
    }

    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
            ]);

        $model = new Contact();
        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->telephone = $request->input('telephone');
        $model->city = $request->input('city');
        $model->zip_code = $request->input('zip_code');
        $model->subject_id = $request->input('subject_id');
        $model->source_id = $request->input('source_id');
        $model->optional = $request->input('optional');
        $model->message = $request->input('message');
        $model->save();

        $data['email'] = $model->email;
        $data['name'] = $model->name;
        $data['msg'] = $model->message;
        $data['telephone'] = $model->telephone;
        $data['city'] = $model->city;
        $data['subject'] = $model->subject->name;
        $data['email-free-presentation'] = explode(',', \Webarq\Site\Models\Setting::ofCodeType('contact-us-free-presentation', 'email')->value);
        $data['email-customer-care'] = explode(',', \Webarq\Site\Models\Setting::ofCodeType('contact-us-customer-care', 'email')->value);
        $data['email-payment'] = explode(',', \Webarq\Site\Models\Setting::ofCodeType('contact-us-payment', 'email')->value);

        if($model->subject->code == 'free-presentation'){
            \Mail::send('emails.contact-us', $data, function ($message) use ($data) {
                $message->from($data['email']);
                $message->subject("Contact Us (".$data['subject'].")");
                $message->to($data['email-free-presentation']);
            });
        }elseif($model->subject->code == 'customer-care'){
            \Mail::send('emails.contact-us', $data, function ($message) use ($data) {
                $message->from($data['email']);
                $message->subject("Contact Us (".$data['subject'].")");
                $message->to($data['email-customer-care']);
            });
        }elseif($model->subject->code == 'email-payment'){
            \Mail::send('emails.contact-us', $data, function ($message) use ($data) {
                $message->from($data['email']);
                $message->subject("Contact Us (".$data['subject'].")");
                $message->to($data['email-payment']);
            });
        }else{
            \Mail::send('emails.contact-us', $data, function ($message) use ($data) {
                $message->from($data['email']);
                $message->subject("Contact Us (".$data['subject'].")");
                $message->to(\Webarq\Site\Models\Setting::ofCodeType('email', 'admin')->value);
            });
        }

        return redirect()->back()->with('message', 'Pesan Anda sudah terkirim!');
    }

    public function getAddress()
    {
        return view('contact.address');
    }
}
