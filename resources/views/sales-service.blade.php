@extends('layouts.master')
@section('content')

<section class="banner">
    <img src="{{ asset('contents/'.$headers->where('code', 'my-account')->first()->img) }}" alt="banner about" />
    <div class="title">
        <h2 class="inner" style="width: 239px !important">Sales Service</h2>
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
            <a href="{{ url(App::getLocale().'/sales/profile') }}" class="<?=(Request::segment(3) == 'profile') ? 'active' : '' ?>">My Info</a>
                <a class="<?=(Request::segment(3) == null) ? 'active' : '' ?>" href="{{ url(App::getLocale().'/sales') }}">Kontrak Pembelian</a></li>
            </nav>
            @endif

            @include('partial.side_menu_bottom')

        </div>
        <div class="inner_content my_account">
            @yield('content_sales-service')

            @include('partial.social_share')

        </div>
    </div>
</section>
@endsection