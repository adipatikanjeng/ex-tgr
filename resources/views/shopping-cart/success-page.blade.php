@extends('shopping-cart')
@section('content_shopping-cart')
<h2 class="title" style="margin: 20px 0px 0px 0px;">
	<span>Thank you<br/>
		for shopping at Tigaraksa
	</span>
	<div class="boxWizard after_clear">
		<ul class="after_clear">
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li class="active">4</li>
		</ul>
	</div>
</h2>

<div class="box_shop_01 after_clear thanks" style="margin:40px 0 0 0">

	<p>
		Your order number is: {{ $orderNumber }}<br/>
		You will receive confirmation email about your detail order<br/>
		{{ $customerEmail }}
	</p>

	<a class="btn_std_dis" href="{{ url(App::getLocale().'/products/lists') }}">Continue shopping!</a>


</div>


@endsection