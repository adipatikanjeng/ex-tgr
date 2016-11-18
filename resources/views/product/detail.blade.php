@extends('product')
@section('content_product')
<div class="breadcrumb">
    <a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
    <a href="{{ url(App::getLocale().'/products') }}">Product</a><span> / </span>
    <a href="">{{ Site::lang($row, 'name') }}</a>

</div>

<div class="prod_detail">
    <h2>{{ Site::lang($row, 'name') }}</h2>
    <h6>{!! Site::lang($row, 'short_desc') !!}</h6>
    <div class="image_1">
      @if(is_file(public_path('contents/'.$row->img)))
      <img src="{{ url('contents/'.$row->img) }}" alt="image1"/>
      @else
      <img src="{{ asset('images/material/noimage.png') }}" alt="noimage" />
      @endif
  </div>
  @foreach(\App\Models\Product\Content::where('product_id', $row->id)->get() as $childRow)
  @if($childRow->type == 'Right Image')
  <div class="box after_clear">
    <div class="left">
        {!! Site::lang($childRow, 'content_words') !!}
    </div>
    <div class="right">
        <div class="image">
            @if(is_file(public_path('contents/'.$childRow->content_image)))
            <img src="{{ asset('contents/'.$childRow->content_image) }}" alt="image2"/>
            @else
            <img  src="{{ asset('images/material/noimage.png') }}" alt="noimage" />
            @endif
        </div>
    </div>
</div>
@endif
@if($childRow->type == 'Left Image' )
<div class="box after_clear">
    <div class="left img_prod_pc">
        <div class="image">
           @if(is_file(public_path('contents/'.$childRow->content_image)))
           <img src="{{ asset('contents/'.$childRow->content_image) }}" alt="image2"/>
           @else
           <img  src="{{ asset('images/material/noimage.png') }}" alt="noimage" />
           @endif
        </div>
    </div>
    <div class="right">
     {!! Site::lang($childRow, 'content_words') !!}
 </div>
 <div class="left img_prod_mobile">
    <div class="image">
       @if(is_file(public_path('contents/'.$childRow->content_image)))
       <img src="{{ asset('contents/'.$childRow->content_image) }}" alt="image2"/>
       @else
       <img  src="{{ asset('images/material/noimage.png') }}" alt="noimage" />
       @endif
    </div>
</div>
</div>
@endif
@if($childRow->type == 'White Box' )
<div class="box_white">
    <p>
        {!! Site::lang($childRow, 'content_words') !!}
        @if(is_file(public_path('contents/'.$childRow->content_image)))
        <img src="{{ asset('contents/'.$childRow->content_image) }}" alt="image2"/>
        @else
        <img  src="{{ asset('images/material/noimage.png') }}" alt="noimage" />
        @endif
    </div>
    @endif
    @if($childRow->type == 'Bottom Box' )
    <div class="box">
        {!! Site::lang($childRow, 'content_words') !!}
        <div class="image">
           @if(is_file(public_path('contents/'.$childRow->content_image)))
           <img src="{{ asset('contents/'.$childRow->content_image) }}" alt="image2"/>
           @else
           <img  src="{{ asset('images/material/noimage.png') }}" alt="noimage" />
           @endif
        </div>
    </div>
    @endif
    @endforeach
    @if($row->is_sale == 'Y' && App\Site::pricelist($row->id) != null  && $row->is_e_commerce == 'Y')
    @if (!Auth::check() || Auth::check() && Auth::user()->customer)
    <h2 class="harga">Harga <br class="br-harga"/>{!! @App\Site::money(App\Site::pricelist($row->id)->total_price) !!}</h2>
    <div class="btn" id="btn-contact-us">
        <a href="{{ url('shopping-cart/buy/'.$row->id) }}" class="contact_btn type_2">
            <img class="image_info" src="{{ asset('images') }}/material/ico_buy.png" alt="buy" /> Buy
        </a>
    </div>
    @endif
    @endif
</div>
@if($row->youtube_link)
Silahkan cek <a href="{{ $row->youtube_link }}" target="_blank">Tutorial Product</a>
@endif
@if($row->is_sale != 'Y' || App\Site::pricelist($row->id) ==null || $row->is_e_commerce == 'N')
<div class="contact_form after_clear" id="contact-us-form">
    <h2>PLEASE FILL THIS FORM TO GET THE QUOTATION</h2>
    @include('partial.alert')
    <form action="{{ url(App::getLocale().'/products/quotation') }}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="product_id" value="{{ $row->id }}">
        <div class="row_input">
            <div class="col_input">
                <label>Nama :</label>
                <input type="text" name="name" value="{{ Input::old('name') }}" required/>
            </div>
            <div class="col_input">
                <label>Email :</label>
                <input type="email" name="email" value="{{ Input::old('email') }}" required/>
            </div>
            <div class="col_input">
                <label>Telepon :</label>
                <input type="text" name="telephone" value="{{ Input::old('telephone') }}" required/>
            </div>
            <div class="col_input">
                <label>Kota :</label>
                <input type="text" name="city" value="{{ Input::old('city') }}" required/>
            </div>
            <div class="col_input">
                <label>Usia anak :</label>
                <input type="text" name="child_age" value="{{ Input::old('child_age') }}"/>
            </div>
        </div>
        <div class="row_input">
            <div class="col_input">
                <label>Komentar :</label>
                <textarea name="message">{{ Input::old('message') }}</textarea>
            </div>
            <div class="col_input">
                <label>Referensi :</label>
                {!! Form::select('source_id', $sources, Input::old('subject_id')) !!}
            </div>
            <div class="col_input">
                <label>Kode Sekuriti :</label>
                <div class="captcha">
                    {!! Recaptcha::render() !!}
                </div>
            </div>
            <div class="col_input">
                <button class="btn_std" style="width:100%;">I'm interested</button>
            </div>
        </div>
    </form>

</div>
@endif

@endsection