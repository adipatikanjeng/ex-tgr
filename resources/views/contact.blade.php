@extends('layouts.master')
@section('content')
<?php $page = 'about';?>
<!-- middle -->
<section class="banner">
	<img src="{{ asset('contents/'.$headers->where('code', 'contact-us')->first()->img) }}" alt="banner about" />
	<div class="title">
		<h2 class="inner">Contact Us</h2>
	</div>
</section>

<section class="content_std">
	<div class="bg_title"></div>
	<div class="bg_side"></div>
	<div class="border_breadcrumb"></div>
	<div class="wrapper">
		<div class="side">

			<nav>
				<a class="<?=(Request::segment(3) == null) ? 'active' : '' ?>" href="{{ url(App::getLocale().'/contact-us') }}">Contact Form</a>
				<a class="<?=(Request::segment(3) == 'address') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/contact-us/address') }}">{{ trans('global.address') }}</a>
			</nav>

			@include('partial.side_menu_bottom')
			<!-- <div class="box after_clear">
				<div class="image">
					<img src="images/content/interested_3.png" alt="interested" />
				</div>
				<div class="text">
					<h4>Interested To Buy Our Products?</h4>
					<a href="" class="readmore type_2">Become Our Team</a>
				</div>
			</div> -->
		</div>
		<div class="inner_content">
			@yield('content_contact')

			@include('partial.social_share')

		</div>
	</div>
</section>
<!-- end of middle -->
@endsection