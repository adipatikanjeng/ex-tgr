@extends('contact')
@section('content_contact')
<div class="breadcrumb breadcrumb_account">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/contact-us') }}">{{ trans('global.contact-us') }}</a><span> / </span>
	<a href="">Contact Form</a>
</div>
<h2>
	Contact Form
</h2>
<div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
	@if($msg = $errors->first())
	<h2>{{ $msg }}</h2>
	@endif
	@if (Session::has('message'))
	<h2>{{ Session::get('message') }}</h2>
	@endif
</div>
<div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
	<form action="{{ url(App::getLocale().'/contact-us') }}" method="POST">
		{!! csrf_field() !!}
		<div class="row_input contact_us">
			<div class="col_input">
				<label style="letter-spacing:2px;">{{ trans('global.name') }} :</label>
				<input type="text" name="name" value="{{ Input::old('name') }}" required/>
			</div>
			<div class="col_input">
				<label style="letter-spacing:2px;">email :</label>
				<input type="text" name="email" value="{{ Input::old('email') }}" required/>
			</div>
			<div class="col_input">
				<label style="letter-spacing:2px;">{{ trans('global.telephone') }} :</label>
				<input type="text" name="telephone" value="{{ Input::old('telephone') }}" required/>
			</div>
			<div class="col_input">
				<label style="letter-spacing:2px;">Subject :</label>
				{!! Form::select('subject_id', $subjects, Input::old('subject_id')) !!}
			</div>
			<div class="col_input">
				<label style="letter-spacing:2px;">{{ trans('global.city') }} :</label>
				<input type="text" name="city" value="{{ Input::old('city') }}" />
			</div>
			<div class="col_input">
				<label style="letter-spacing:2px;">{{ trans('global.zip-code') }} :</label>
				<input type="text" name="zip_code" value="{{ Input::old('zip_code') }}"/>
			</div>
		</div>
		<div class="row_input contact_us">
			<div class="col_input">
				<label style="letter-spacing:2px;">{{ trans('contact.source') }} :</label>
				{!! Form::select('source_id', $sources, Input::old('source_id')) !!}
			</div>
			<div class="col_input">
				<label style="letter-spacing:2px;">{{ trans('contact.optional') }} :</label>
				<input type="text" name="optional" value="{{ Input::old('optional') }}" />
			</div>
			<div class="col_input">
				<label style="letter-spacing:2px;">{{ trans('contact.message') }} :</label>
				<textarea style="height:100px;" name="message">{{ Input::old('message') }}</textarea>
			</div>
			<div class="col_input">
				<label>{{ trans('global.security') }} :</label>
				<div class="captcha">
					{!! Recaptcha::render() !!}
				</div>
			</div>
			<div class="col_input">
				<button class="btn_std" type="submit" style="padding: 0 115px;">Submit</button>

			</div>
		</div>
	</form>

</div>
@endsection