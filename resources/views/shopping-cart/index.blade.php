@extends('shopping-cart')
@section('content_shopping-cart')
<h2>
	Shopping Cart
</h2>
<form action="{{ url(App::getLocale().'/shopping-cart/shipping') }}" method="GET">
	{!! csrf_field() !!}
	<div id="shoppingCart">
		@include('partial.shopping-cart')
	</div>
	<div class="action_shopping after_clear">
		<div class="continue"> <a href="{{ url(App::getLocale().'/products') }}" class="readmore type_2">Continue Shopping</a></div>
		<div class="submit"><button type="submit" class="btn_std_dis">Pay Now</button></div>
	</div>
</form>
@endsection