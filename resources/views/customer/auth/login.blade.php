@extends('shopping-cart')
@section('content_shopping-cart')
<h2 class="title">
	<span>Login</span>
	<div class="boxWizard after_clear">
		<ul class="after_clear">
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li class="active">4</li>
		</ul>
	</div>
</h2>

@include('partial.alert')

<div class="box_shop_01 after_clear">
	<div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
		<form action="{{ url(App::getLocale().'/customers/auth/authenticate') }}" method="POST" id="login">
			{!! csrf_field() !!}
			<h2>Login</h2>
			<div class="row_input contact_us">
				<div class="col_input">
					<label style="letter-spacing:2px;">email :</label>
					<input type="email" name="email" required/>
				</div>
				<div class="col_account radio-login">
					<div class="radio-inline">
						<label class="after_clear" style="display:block;">
							<input type="radio" name="customer" value="new" id="newCustomer" autocomplete="off" />
							<span>{{ trans('login.new-customer') }}</span>
						</label>
						<label style="display:block;">
							<input type="radio" name="customer" checked="true" value="exist" autocomplete="off"/>
							<span>{{ trans('login.old-customer') }}</span>
						</label>
					</div>
				</div>

				<div class="col_input reset_pass after_clear">
					<label style="letter-spacing:2px;">password :</label>
					<input type="password" name="password" required/>
					<span class="reset_link">
						<a  href="{{ url(App::getLocale().'/password/email') }}" style="" class="readmore type_2">Forgot Password?</a>
					</span>

				</div>
				<div class="col_input">
					<label>{{ trans('global.security') }}:</label>
					<div class="captcha">
						{!! Recaptcha::render() !!}
					</div>
				</div>
				<div class="col_input" style="margin:20px 0 0 0;">
					<button type="submit" class="btn_std_dis" style="padding:0 120px;">Continue</button>
				</div>


			</div>

		</form>
	</div>

	<div class="detail_order">
		<h2>{{ trans('global.detail-order') }} ({{ count($rows) }} items)</h2>
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
				<?php $total += $row->price ?>
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
<script type="text/javascript">
	$('#newCustomer').on('change', function(){
		window.location = "{{ url(App::getLocale().'/customers/register') }}";
	});
</script>
@endsection