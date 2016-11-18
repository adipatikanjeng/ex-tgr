@extends('layouts.master')
@section('content')

<section class="banner">
	<img src="{{ asset('contents/'.$headers->where('code', 'customers')->first()->img) }}" alt="banner about" />
	<div class="title">
		<h2 class="inner">My Account</h2>
	</div>
</section>

<section class="content_std">
	<div class="bg_title"></div>
	<div class="bg_side"></div>
	<div class="border_breadcrumb border_breadcrumb_account"></div>
	<div class="wrapper">
		<div class="side">
			@if(Auth::check())
			<nav>
				<a href="{{ url(App::getLocale().'/customers') }}" class="<?=(Request::segment(3) == null) ? 'active' : '' ?>">My Profile</a>
				<div class="acc_list">
					<ul>
						<li><a class="<?=(Request::segment(3) == 'order-histories') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/customers/order-histories') }}">History Order</a></li>
					</ul>
				</div>
				<a href="{{ url(App::getLocale().'/customers/tracking-orders') }}" class="<?=(Request::segment(3) == 'tracking-orders') ? 'active' : '' ?>" >Tracking Order</a>
				<a href="{{ url(App::getLocale().'/customers/payment-confirmation') }}" class="<?=(Request::segment(3) == 'confirm-payment') ? 'active' : '' ?>" >Confirm Payment</a>
			</nav>
			@endif

			@include('partial.side_menu_bottom')

		</div>
		<div class="inner_content my_account">
			@yield('content_customer')

			@include('partial.social_share')

		</div>
	</div>
</section>
@endsection