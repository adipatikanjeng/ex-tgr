<div class="col-sm-4">
	<div class="md-form-group">
		<input name="code" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('code') }}">
		<label>Code</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="desc" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('desc') }}">
		<label>Description</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('product_id', \App\Models\Product::lists('name', 'id'), Admin::inputValue('product_id'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Product</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="installment_number" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('installment_number') }}">
		<label>Installment Number</label>
	</div>
</div>
<div class="col-sm-8">
	<div class="md-form-group">
		<input name="dp_amount" class="md-input" value="{!! Admin::inputValue('dp_amount') !!}" >
		<label>DP Amount</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="installment_amount" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('installment_amount') }}">
		<label>Floor</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="total_price" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('total_price') }}">
		<label>Total Price</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="sales_unit" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('sales_unit') }}">
		<label>Sales Unit</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="sales_type" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('sales_type') }}">
		<label>Sales Type</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="cash_value" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('cash_value') }}">
		<label>Cash Value</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="commission" class="md-input" value="{!! Admin::inputValue('commission') !!}">
		<label>Commission</label>
	</div>
</div>