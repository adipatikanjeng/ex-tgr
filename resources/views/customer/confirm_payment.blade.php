@extends('customer')
@section('content_customer')
<div class="breadcrumb breadcrumb_account">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/customers') }}">My Account</a><span> / </span>
	<a href="">Confirm Payment</a>
</div>
<h2>
	Confirm Payment
</h2>
@include('partial.alert')
<div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
	<form action="{{ url(App::getLocale().'/customers/payment-confirmation') }}" method="POST" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<div class="row_account after_clear">
			<div class="col_account">
				<label style="letter-spacing:2px;">No. Order :</label>
				<input type="text" name="order_number" value="{{ (Input::old('order_number')) ?: $orderNumber }}" required/>
			</div>
			<div class="col_account">
			</div>
		</div>
		<h2 style="margin-top:40px;">From your account</h2>
		<div class="row_account keluarga_terdekat after_clear">
			<div class="col_account">
				<div class="row_account3">
					<div class="col_account3">
						<label style="letter-spacing:2px;">Bank :</label>
						<input type="text" name="bank_name" value="{{ Input::old('bank_name') }}" required/>
					</div>
					<div class="col_account3" style="margin-top:15px;">
						<label style="letter-spacing:2px;">Account name :</label>
						<input type="text" name="account_name" value="{{ Input::old('account_name') }}" required/>
					</div>
				</div>
			</div>
			<div class="col_account">
				<label style="letter-spacing:2px;">Account Number :</label>
				<input type="text" name="account_number" value="{{ Input::old('account_number') }}" required />
			</div>
		</div>
		<h2 style="margin-top:60px;">To Tigaraksa Account</h2>
		<div class="row_account program after_clear">
			<div class="col_account">
				<label style="letter-spacing:2px;">Bank :</label>
				{!! Form::select('bank_id', $bankList, Input::old('bank_id'), ['required']) !!}
			</div>
			<div class="col_account">
				<label style="letter-spacing:2px;">Date of Transfer :</label>
				<input type="text" name="transfer_date" value="{{ Input::old('transfer_date') }}" class="datetimepicker" />
			</div>
		</div>
		<div class="row_account after_clear">
			<div class="col_account">
				<label style="letter-spacing:2px;">Amount : </label>
				<input type="number" name="amount" value="{{ Input::old('amount') }}"/>
			</div>
			<div class="col_account">
				<label style="letter-spacing:2px;">File : </label>
				<input type="file" name="file" value="{{ Input::old('file') }}" />
			</div>
				<label style="letter-spacing:2px;">Keterangan : </label>
				<div style="border-bottom:1px solid #ddd;margin-top:3px;"></div>
				<label>Untuk mempercepat proses konfirmasi pembayaran, masukan nomer sequence sebagai referensi/berita contoh EC126535 ambil 126535 untuk sequence nya.</label>
		</div>


		<div style="margin-top:40px;">
			<button type="submit" class="btn_std" style="padding:0 40px">Confirm</button>
		</div>

	</form>

</div>

<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
@include('partial.footer-account')
@endsection