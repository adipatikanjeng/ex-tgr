@extends('account')
@section('content_account')
<div class="breadcrumb breadcrumb_account">
    <a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
    <a href="{{ url(App::getLocale().'/my-account') }}">My Account</a><span> / </span>
    <a href="{{ url(App::getLocale().'/my-account') }}">My Info</a><span> / </span>
    <a href="">Kontrak Pembelian</a>
</div>
<h2>
    Kontrak Pembelian
    <div class="boxWizard after_clear">
        <ul class="after_clear">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li class="active">4</li>
        </ul>
    </div>
</h2>

<div class="contact_form pernyataan after_clear" style="margin:60px 0 0 0">
{!! $termAndCond !!}
</div>

<div style="margin-top:20px;">
    <form action="{{ url(App::getLocale().'/my-account/contracts/page-four') }}" method="POST">
    <input type="hidden" name="id" value="{{ @$contract->id }}">
    {!! csrf_field() !!}
        <button type="submit" class="btn_std_dis" style="padding:0 115px">Submit</button>
    </form>
</div>

@endsection