@extends('layouts.master')
@section('content')

<section class="banner">
    <img src="{{ asset('contents/'.$headers->where('code', 'my-account')->first()->img) }}" alt="banner about" />
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
                <a href="{{ url(App::getLocale().'/my-account') }}" class="<?=(Request::segment(2) == 'my-account' && Request::segment(3) == null) ? 'active' : ''?>">My Info</a>
                <div class="acc_list">
                    <ul>
                        <li><a class="<?=(Request::segment(3) == 'contracts') ? 'active' : ''?>" href="{{ url(App::getLocale().'/my-account/contracts') }}">Kontrak Pembelian</a></li>
                    </ul>
                </div>
                <a href="{{ url(App::getLocale().'/my-account/tracking-order') }}" class="<?=(Request::segment(3) == 'tracking-order') ? 'active' : ''?>" >Tracking Order</a>
            </nav>
            @endif

            @include('partial.side_menu_bottom')

        </div>
        <div class="inner_content my_account">
            @yield('content_account')

            @include('partial.social_share')

        </div>
    </div>
</section>
@endsection