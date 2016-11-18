@extends('account')
@section('content_account')
<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/my-account') }}">My Account</a><span> / </span>
	<a href="">My Info</a>
</div>

<h2>
	My Info
</h2>
<div class="account_form form_account after_clear" style="margin:40px 0 0 0">
	@if($msg = $errors->first())
	<h2>{{ $msg }}</h2>
	@endif
	@if (Session::has('message'))
	<h2>{{ Session::get('message') }}</h2>
	@endif
</div>

<div class="account_form after_clear" style="margin:20px 0 0 0">
	<h2>For more information please login first</h2>
	<form action="{{ url(App::getLocale().'/auth/authenticate') }}" method="POST">
		{!! csrf_field() !!}
		<div class="row_input">
			<div class="col_input">
				<label>Username :</label>
				<input type="username" name="username" required/>
			</div>
			<div class="col_input">
				<label>Password :</label>
				<input type="password" name="password" required/>
			</div>
		</div>
		<div class="row_input">
			<div class="col_input">
				<label>{{ trans('global.security') }} :</label>
				<div class="captcha">
					{!! Recaptcha::render() !!}
				</div>
			</div>
			<div class="col_input">
				<button class="btn_std" type="submit" style="padding: 0 30px;">Login</button>
				<br><br>
				<a href="{{ url(App::getLocale().'/sales/auth/login') }}" class="readmore type_2" style="margin-left:20px;">Login as Sales Services</a>
			</div>
		</div>
	</form>

</div>
<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
@include('partial.footer-account')
@endsection