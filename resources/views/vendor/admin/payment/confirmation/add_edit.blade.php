<div class="col-sm-4">
	<div class="md-form-group">
		<input name="order_number" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('order_number') }}">
		<label>Order Number</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="bank_name" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('bank_name') }}">
		<label>Bank Name (source)</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="account_number" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('account_number') }}">
		<label>Account Number (source)</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="account_name" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('account_name') }}">
		<label>Account Name </label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="bank_id" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('bank->name') }}">
		<label>Bank Name (destination)</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="bank_id" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('bank->account_number') }}">
		<label>Account Number (destination)</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="transfer_date" type="text" class="md-input" disabled="true" id="label1" value="{{ Carbon::parse(Admin::inputValue('transfer_date'))->format('Y-m-d h:m:s') }}">
		<label>Transfer Date</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! Form::select('is_confirmed', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_confirmed'), ['class' => 'md-input', (Admin::inputValue('is_confirmed') == 'Y') ? 'disabled' : ''] ) !!}
		<label>Is Confirmed</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="amount" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('amount') }}">
		<label>Amount</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<span><a href="{{ asset('contents/'.Admin::inputValue('file')) }}" target="_blank"><input type="text" class="md-input" id="label1" value="{{ Admin::inputValue('file') }}"></a></span>
		<label>File</label>
	</div>
</div>
<input type="hidden" name="order_number" value="{{ Admin::inputValue('order_number') }}">
