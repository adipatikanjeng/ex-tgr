@extends('layouts.master')
@section('content')
<section class="banner">
<img src="{{ asset('contents/'.$headers->where('code', 'activities')->first()->img) }}" alt="banner about" />
<div class="title">
    <h2 class="inner">Activities</h2>
</div>
</section>

<section class="content_std">
    <div class="bg_title"></div>
    <div class="bg_side"></div>
    <div class="border_breadcrumb"></div>
    <div class="wrapper">
        <div class="side">

            <nav>
                <a class="<?=(Request::segment(3) == 'events') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/activities/events/') }}" style="border-bottom:0">Events</a>
                @if (Request::segment(3) == 'events')
                <div class="acc_list">
                    <ul>
                        <li><a class="<?=(Request::segment(3) == 'events' && Request::segment(4) == 'next-event') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/activities/events/next-event') }}">Next Event</a></li>
                        <li><a class="<?=(Request::segment(3) == 'events' && Request::segment(4) == 'history') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/activities/events/history') }}">History</a></li>
                    </ul>
                </div>
                @endif
                <div style="border-bottom:1px solid #ddd;"></div>
                <a class="<?=(Request::segment(3) == 'galleries') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/activities/galleries') }}" >Galleries</a>
                <a class="<?=(Request::segment(3) == 'csr') ? 'active' : '' ?>" href="{{ url(App::getLocale().'/activities/csr/') }}" style="border-bottom:0">CSR Activities</a>
            </nav>

            @include('partial.side_menu_bottom')

        </div>
        <div class="inner_content">
            @yield('content_activity')

            @include('partial.social_share')

        </div>
    </div>
</section>
@endsection