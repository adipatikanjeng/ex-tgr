@extends('product')
@section('content_product')
<div class="breadcrumb">
    <a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
    <a href="{{ url(App::getLocale().'/products') }}">Product</a><span> / </span>
    <a href="">{{ @Site::lang($rows->first()->category, 'name') }}</a>

</div>

<h2>
    {{ @Site::lang($rows->first()->category, 'name') }}<br/>
    {{ @Site::lang($rows->first()->category, 'short_desc') }}
</h2>

<div class="list_product etl after_clear">
    @foreach($rows as $row)
    <div class="box after_clear">
        <div class="image">
            @if(is_file(public_path('contents/'.$row->img)))
            <img style="max-width:291px;max-height: 200px" src="{{ asset('contents/'.$row->img) }}" alt="product" />
            @else
            <img style="max-width:200px" src="{{ asset('images/material/noimage.png') }}" alt="noimage" />
            @endif
        </div>
        <div class="middle_text">
            <h5>{{ $row->name }}</h5>
        @if(App\Site::pricelist($row->id) != null && $row->is_sale == 'Y' && $row->is_e_commerce == 'Y' && (!Auth::check() || Auth::check() && Auth::user()->customer))
            <p>{{ @App\Site::money(App\Site::pricelist($row->id)->total_price) }}</p>
        </div>
        <a href="{{ url(App::getLocale().'/products/'.$rows->first()->category->permalink.'/'.$row->id.'/'.str_slug($row->name)) }}" class="contact_btn">
            Buy
        </a>
        @else
        </div>
        <a href="{{ url(App::getLocale().'/products/'.$rows->first()->category->permalink.'/'.$row->id.'/'.str_slug($row->name)) }}" class="contact_btn">
            Contact Us
        </a>
        @endif
    </div>
    @endforeach
</div>
 @include('pagination.default',['paginator'=>$rows])
@endsection