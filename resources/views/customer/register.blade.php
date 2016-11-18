@extends('shopping-cart')
@section('content_shopping-cart')
<h2>
    Register
</h2>
@include('partial.alert')
<div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
    <form action="{{ url(App::getLocale().'/customers/register') }}" method="POST">
        {!! csrf_field() !!}
        <div class="row_input contact_us">
            <div class="col_input">
                <label style="letter-spacing:2px;">Email :</label>
                <input type="email" name="email" value="{{ Input::old('email') }}" required/>
            </div>
            <div class="col_input">
                <label style="letter-spacing:2px;">Password :</label>
                <input type="password" name="password" value="{{ Input::old('password') }}" required/>
            </div>
            <div class="col_input">
                <label style="letter-spacing:2px;">re-type password :</label>
                <input type="password" name="password_confirmation" value="{{ Input::old('password_confirmation') }}" required/>
            </div>
            <div class="col_input">
                <label style="letter-spacing:2px;">{{ trans('global.name') }} :</label>
                <input type="text" name="name" value="{{ Input::old('name') }}" required/>
            </div>
            <div class="col_input">
                <label style="letter-spacing:2px;">{{ trans('global.gender') }} :</label>
                {!! Form::select('gender', ['M' => 'Laki-laki', 'l' => 'Perempuan'], Input::old('gender')) !!}
            </div>
        </div>
        <div class="row_input contact_us">
            <div class="col_input">
                <label style="letter-spacing:2px;">{{ trans('global.place-of-birth') }} :</label>
                <input type="text" name="place_of_birth" value="{{ Input::old('place_of_birth') }}" required/>
            </div>
            <div class="col_input">
                <label style="letter-spacing:2px;">{{ trans('global.date-of-birth') }} :</label>
                <input type="text" class="datepicker" name="date_of_birth" value="{{ Input::old('date_of_birth') }}" required/>
            </div>

            <div class="col_input">
                <label>{{ trans('global.security') }} :</label>
                <div class="captcha">
                    {!! Recaptcha::render() !!}
                </div>
            </div>
            <div class="col_input">
                <button class="btn_std" type="submit" style="padding: 0 115px;">Submit</button>
                <span class="reset_link">
                <a  href="{{ url(App::getLocale().'/customers/auth/login') }}" style="" class="readmore type_2">Have account? Please login here!</a>
                </span>
            </div>
        </div>
    </form>

</div>

@endsection