@extends('shopping-cart')
@section('content_shopping-cart')
<h2 style="margin: 20px 0px 0px 0px;">
	Detail Order
</h2>

<div class="box_shop_01 after_clear">
	<div class="prod_detail_order">
		<h2>Detail Order ({{ $rows->count() }} items)</h2>
		<div>
			<table>
				<tr>
					<th colspan="2">Items</th>
					<th class="total" style="text-align:right;padding-right:48px;">Total</th>
				</tr>
				<?php $subtotal = 0 ?>
				@foreach($rows as $row)
				<tr>
					<td colspan="3" style="vertical-align:top">
						<div class="boximg_prod_detail">
							<div><img width="100px" src="{{ asset('contents/'.$row->product->img) }}"/></div>
							<div class="desc">
								<h5>{{ $row->product->name }}</h5>
								<p class="qty">Quantity : {{ $row->quantity }}</p>
							</div>
							<div class="harga">
								{{ App\Site::money($row->total_price) }}
							</div>
						</div>

					</td>
				</tr>
				<?php $subtotal += $row->total_price ?>
				@endforeach
				<tr>
					<td colspan="3" style="vertical-align:top;border-bottom:0px;padding-top:0px">
						<div class="boxharga_prod_detail after_clear">
							<div class="sub_shipping">
								Subtotal
							</div>
							<div class="harga_shipping">
								<span>{{ App\Site::money($subtotal) }}</span>
							</div>
						</div>

					</td>
				</tr>
				<tr>
					<td colspan="3" style="vertical-align:top;padding-bottom:10px">
						<div class="boxharga_prod_detail after_clear">
							<div class="sub_shipping">
								Shipping
							</div>
							<div class="harga_shipping">
								<span>{{ App\Site::money($order->shipping_amount) }}</span>
							</div>
						</div>

					</td>
				</tr>
				<tr>
					<th colspan="3" style="border:none;height:0px;padding-top:0px;">&nbsp;</th>
				</tr>
				<tr>
					<td colspan="3" style="vertical-align:top;border-bottom:0px;padding-top:0px">
						<div class="boxharga_prod_detail after_clear">
							<div class="sub_shipping" style="padding: 0 0 0 0;">
								Total
							</div>
							<div class="harga_shipping" style="padding: 0 0 0 0;">
								<span style="font-family:'open_sansbold';font-size:16px;">{{ App\Site::money($order->total_amount) }}</span>
							</div>
						</div>

					</td>
				</tr>
			</table>
		</div>
	</div>


	<div class="detail_order order_2 detail_order_3">
		<h2>Email</h2>
		<span>{{ $order->customer->user->email }}</span>
	</div>

	@include('partial.shipping-address', compact('address', 'billingAddress'))

	<div class="detail_order order_2">
		<h2>Payment Method</h2>
		<span>{{ $order->payment_method }}</span>
	</div>
	@if(!Request::segment('5'))
	<div class="detail_order order_2 action_btn">
		<a href="{{ url(App::getLocale().'/shopping-cart/success-page/'.$order->order_number) }}"><button class="btn_std_dis">Continue</button></a>
		<a href="{{ url(App::getLocale().'/customers/invoice/'.$order->id) }}" class="readmore type_2">Save/ Print Invoice </a>
	</div>
	@endif

</div>

@endsection