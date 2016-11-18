@extends('layouts.master')
@section('content')<section class="banner">
<img src="{{ asset('contents/'.$headers->where('code', 'request-seminar')->first()->img) }}" alt="banner about" />
<div class="title">
	<h2 class="inner">{{ trans('global.seminars') }}</h2>
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
				<a href="">Request for Seminar</a>
			</div>

			<h2>
				{{ Site::lang($row, 'title') }}
			</h2>

			{!! Site::lang($row, 'content') !!}

			<ol class="topik_seminar">
				@foreach($seminarTopics as $row)
				<li>
					{!! Site::lang($row, 'name') !!}<br/>
					<span>Obyektif seminar :</span>
					<p>{{ Site::lang($row, 'desc') }}
					</p>
				</li>
				@endforeach
			</ol>

			<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
			@include('partial.alert')
			<div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
				<form action="{{ url(App::getLocale().'/seminars/request') }}" method="POST">
					{!! csrf_field() !!}
					<p>Silahkan isi form untuk request seminar:</p>
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
							<input type="text" name="email" value="{{ Input::old('email') }}" required/>
						</div>
						<div class="col_input">
							<label style="letter-spacing:2px;">{{ trans('global.telephone') }} :</label>
							<input type="text" name="telephone" value="{{ Input::old('telephone') }}" required/>
						</div>

					</div>
					<div class="row_input contact_us become_our_team_contact">
						<div class="col_input">
							<label style="letter-spacing:2px;">{{ trans('seminar.interest-topic') }} :</label>
							{!! Form::select('topic_id', $seminarTopics->lists('name_locale_id', 'id')) !!}
						</div>
						<div class="col_input">
							<label>{{ trans('global.security') }} :</label>
							<div class="captcha">
								{!! Recaptcha::render() !!}
							</div>
						</div>
						<div class="col_input">
							<button class="btn_std" type="submit" style="padding: 0 72px;">{{ trans('seminar.i-m-interested') }}</button>

						</div>
					</div>
				</form>

			</div>

			@include('partial.social_share')

		</div>
	</div>
</section>
@endsection