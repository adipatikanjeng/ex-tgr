@extends('shopping-cart')
@section('content_shopping-cart')
<h2 class="title">
	<span>Shipping</span>
	<div class="boxWizard after_clear">
		<ul class="after_clear">
			<li>1</li>
			<li class="active">2</li>
			<li>3</li>
			<li>4</li>
		</ul>
	</div>
</h2>
@include('partial.alert')
<div class="box_shop_01 after_clear">
	<div class="contact_form form_account cart_2 after_clear" style="margin:40px 0 0 0">
		<form action="{{ url(App::getLocale().'/shopping-cart/shipping') }}" method="POST">
			{!! csrf_field() !!}
			<h2>Your shipping address</h2>
			<div class="row_input contact_us">
				<div class="col_input">
					<label style="letter-spacing:2px;">name :</label>
					<input type="text" name="name" value="{{ (Input::old('name')) ?: @$shippingAddress->name }}" required/>
				</div>
				<div class="col_input">
					<label style="letter-spacing:2px;">address :</label>
					<input type="text" name="address" value="{{ (Input::old('address')) ?: @$shippingAddress->address }}" required/>
				</div>
				<div class="col_input">
					<label style="letter-spacing:2px;">province :</label>
					{!! Form::select('province_id', $provinces, (Input::old('province_id')) ?: @$shippingAddress->city->province->id, ['id' => 'provinceShipping', 'data-url' => url(App::getLocale().'/shopping-cart/ajax-cities')]) !!}
				</div>
				<div class="col_input">
					<label style="letter-spacing:2px;">City :</label>
					{!! Form::select('city_id', $cities, (Input::old('city_id')) ?: @$shippingAddress->city_id , ['id' => 'cityShipping']) !!}
				</div>
				<div class="col_input">
					<label style="letter-spacing:2px;">telephone :</label>
					<input type="text" name="telephone" value="{{ (Input::old('telephone')) ?: @$shippingAddress->telephone }}"/>
				</div>
				<div class="col_account radio-login">
					<div class="radio-inline">
						<label class="after_clear" style="display:block;">
							<input type="checkbox" name="other_billing_address" value="1" />
							<span>Billing to other address</span>
						</label>
						<label style="display:block;">
							<input type="checkbox" name="term_n_condition" required/>
							<span>I accept the <a href="{{ url(App::getLocale().'/shopping-cart/term-and-condition') }}" style="text-decoration:underline;color:#333333;">term & conditions</a></span>
						</label>
					</div>
				</div>
				<div class="col_input" style="margin:20px 0 0 0;">
					<button type="submit" class="btn_std_dis" style="padding:0 120px;">Continue</button>
				</div>
			</div>
		</form>
	</div>

	<div class="detail_order order_2">
		<h2>Detail Order ({{ count($rows) }} items)</h2>
		<div>
			<table>
				<tr>
					<th>Items</th>
					<th style="text-align:center">Qty</th>
					<th class="total" style="text-align:center;">Total</th>
				</tr>
				<?php $total = 0 ?>
				@foreach($rows as $row)
				<tr>
					<td>{{ $row->product->name }}</td>
					<td style="text-align:center">{{ $row->quantity }}</td>
					<td style="text-align:right">{{ App\Site::money($row->price) }}</td>
				</tr>
				<?php $total +=  $row->price ?>
				@endforeach
				<tr>
					<th colspan="3" style="border-bottom:1px solid #ddd;">&nbsp;</th>

				</tr>

				<tr>
					<th colspan="2" style="text-align:right;padding-top:20px;">Subtotal</th>
					<th class="total total_all">
						<span>{{ App\Site::money($total) }}</span>
					</th>
				</tr>
			</table>
		</div>
	</div>
</div>

@endsection