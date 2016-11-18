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
		<input name="pricelist_code" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('pricelist_code') }}" required>
		<label>Pricelist Code</label>
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
		<input name="product_quantity" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('product_quantity') }}" required>
		<label>product_quantity</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="credit_installment_number" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('credit_installment_number') }}" required>
		<label>Credit Installment Number</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="line_type" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('line_type') }}" required>
		<label>Line Type</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="cash_investation_amount" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('cash_investation_amount') }}" required>
		<label>Cash Investation Amount</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="credit_investation_amount" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('credit_investation_amount') }}" required>
		<label>credit investation amount</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="product_sequence_number" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('product_sequence_number') }}" required>
		<label>product sequence number</label>
	</div>
</div>