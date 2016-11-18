@extends('layouts.master')
@section('content')

<section class="banner">
	<img src="{{ asset('contents/'.$headers->where('code', 'about-us')->first()->img) }}" alt="banner about" />
	<div class="title">
		<h2 class="inner">{{ trans('about.about-us') }}</h2>
	</div>
</section>

<section class="content_std">
	<div class="bg_title"></div>
	<div class="bg_side"></div>
	<div class="border_breadcrumb"></div>
	<div class="wrapper">
		<div class="side">

			<nav>
				<a class="<?=(Request::segment(3) == 'management') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/about-us/management') }}" >Management</a>
				<a class="<?=(Request::segment(3) == 'our-branches') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/about-us/our-branches') }}" >Our Branches</a>
				<a class="<?=(Request::segment(3) == 'awards') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/about-us/awards') }}" >Awards</a>
			</nav>

			@include('partial.side_menu_bottom')
		</div>
		<div class="inner_content">
			@yield('content_about')

			@include('partial.social_share')

		</div>
	</div>
</section>
<!-- end of middle -->
@endsection