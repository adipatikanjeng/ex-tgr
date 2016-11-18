@extends('layouts.master')
@section('content')

<section class="content_std">
    <div class="bg_title"></div>
    <div class="wrapper">
        <div class="inner_content inner_shopping_cart shop_cart_01">

            @yield('content_shopping-cart')

            @include('partial.social_share')

        </div>
    </div>
</section>
@endsection