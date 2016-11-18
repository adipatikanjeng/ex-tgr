@extends('shopping-cart')
@section('content_shopping-cart')
<h2 class="title" style="margin: 20px 0px 0px 0px;">
    <span>{!! Site::lang($row, 'title') !!}</span>
</h2>

{!! Site::lang($row, 'content') !!}
<div class="col_input" style="margin:20px 0 0 0;">
<button type="submit" onclick="window.history.back()" class="btn_std_dis" style="padding:0 70px;">Back</button>
</div>

@endsection