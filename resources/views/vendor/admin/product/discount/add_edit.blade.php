<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('product_code', \App\Models\Product::lists('name', 'code'), Admin::inputValue('product_code'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Product</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="code" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('code') }}" required>
		<label>Code</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="discount_desc" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('discount_desc') }}" required>
		<label>Discount Desc</label>
	</div>
</div>

<div class="col-sm-4">
	<div class="md-form-group">
		<input name="min_amount" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('min_amount') }}" required>
		<label>Min Amount</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="max_amount" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('max_amount') }}" required>
		<label>Max Amount</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="discount" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('discount') }}" required>
		<label>Discount</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="discount_type" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('discount_type') }}" required>
		<label>Discount Type</label>
	</div>
</div>