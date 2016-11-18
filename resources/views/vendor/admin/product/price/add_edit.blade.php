<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('product_id', \App\Models\Product::lists('name', 'id'), Admin::inputValue('product_id'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Product</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="installment" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('installment') }}" required>
		<label>Installment</label>
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
		<input name="amount_installment" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('amount_installment') }}" required>
		<label>Amount Per Installment</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="total_price" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('total_price') }}" required>
		<label>Total Price</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<input name="sales_unit" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('sales_unit') }}" required>
		<label>Sales Unit</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<input name="sales_type" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('sales_type') }}" required>
		<label>Sales Type</label>
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