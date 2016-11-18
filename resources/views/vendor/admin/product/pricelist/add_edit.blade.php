<div class="col-sm-4">
	<div class="md-form-group">
		<input name="code" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('code') }}" required>
		<label>Code</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="desc" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('desc') }}" required>
		<label>Description</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('product_code', \App\Models\Product::lists('name', 'code'), Admin::inputValue('product_code'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Product</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="installment_number" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('installment_number') }}" required>
		<label>Installment Number</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="dp_amount" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('dp_amount') }}" required>
		<label>DP Amount</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="installment_amount" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('installment_amount') }}" required>
		<label>Amount Per Installment</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="total_price" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('total_price') }}" required>
		<label>Total Price</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="su_ch_sales" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('su_ch_sales') }}" required>
		<label>su_ch_sales</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="su_cr_sales" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('su_cr_sales') }}" required>
		<label>su_cr_sales</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="cash_value" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('cash_value') }}" required>
		<label>Cash Value</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="commission" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('commission') }}" required>
		<label>Commission</label>
	</div>
</div>