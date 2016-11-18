<div class="col-sm-12">
	<div class="md-form-group">
		<input name="order_number" type="text" disabled class="md-input" id="label1" value="{{ Admin::inputValue('order->order_number') }}" required>
		<label>Order Parent</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="order_number" disabled type="text" class="md-input" id="label1" value="{{ Admin::inputValue('order_number') }}" required>
		<label>Order Number</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="name" type="text" disabled class="md-input" id="label1" value="{{ Admin::inputValue('order->customer->name') }}" required>
		<label>Customer Name</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="shipping_amount" disabled type="text" class="md-input" id="label1" value="{{ Admin::inputValue('shipping_amount') }}" required>
		<label>Shipping Amount</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="total_amount" type="text" disabled class="md-input" id="label1" value="{{ Admin::inputValue('total_amount') }}" required>
		<label>Total Amount</label>
	</div>
</div>