@extends('layouts.master')
@section('content')<section class="banner">
<img src="{{ asset('contents/'.$headers->where('code', 'join-our-team')->first()->img) }}" alt="banner about" />
<div class="title">
	<h2 class="inner">Join Team</h2>
</div>
</section>

<section class="content_std">
	<div class="bg_title"></div>
	<div class="bg_side"></div>
	<div class="border_breadcrumb"></div>
	<div class="wrapper">
		<div class="side">

			@include('partial.side_menu_bottom')

		</div>
		<div class="inner_content become_our_team">
			<div class="breadcrumb">
				<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
				<a href="">Join Our Team</a>
			</div>

			<h2>
				{!! Site::lang($row, 'title') !!}
			</h2>

			{!! Site::lang($row, 'content') !!}

			<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
			@include('partial.alert')
			<div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
				<form action="{{ url(App::getLocale().'/join-our-team') }}" method="POST">
					{!! csrf_field() !!}
					<h2>{{ trans('team.header') }} :</h2>
					<div class="row_input contact_us">
						<div class="col_input">
							<label style="letter-spacing:2px;">{{ trans('global.name') }} :</label>
							<input type="text" name="name" value="{{ Input::old('name') }}" required/>
						</div>
						<div class="col_input">
							<label style="letter-spacing:2px;">{{ trans('global.city') }} :</label>
							<input type="text" name="city" value="{{ Input::old('city') }}" required/>
						</div>
						<div class="col_input">
							<label style="letter-spacing:2px;">email :</label>
							<input type="email" name="email" value="{{ Input::old('email') }}" required/>
						</div>
						<div class="col_input">
							<label style="letter-spacing:2px;">{{ trans('global.telephone') }} :</label>
							<input type="text" name="telephone" value="{{ Input::old('telephone') }}" required/>
						</div>

					</div>
					<div class="row_input contact_us become_our_team_contact">
						<div class="col_input">
							<label style="letter-spacing:2px;">{{ trans('global.message') }} :</label>
							<textarea style="height:100px;" name="comment">{{ Input::old('comment') }}</textarea>
						</div>
						<div class="col_input">
							<label>{{ trans('global.security') }} :</label>
							<div class="captcha">
								{!! Recaptcha::render() !!}
							</div>
						</div>
						<div class="col_input">
							<button class="btn_std" type="submit" style="padding: 0 72px;">I'm Interested</button>

						</div>
					</div>
				</form>

			</div>

			@include('partial.social_share')

		</div>
	</div>
</section>
@endsection