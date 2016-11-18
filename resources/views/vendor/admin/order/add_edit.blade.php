<div class="col-sm-12">
	<div class="md-form-group">
		<input name="order_number" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('order_number') }}" required>
		<label>Order Number</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('customer->name') }}" required>
		<label>Customer Name</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="shipping_amount" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('shipping_amount') }}" required>
		<label>Shipping Amount</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="total_amount" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('total_amount') }}" required>
		<label>Total Amount</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="payment_method" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('payment_method') }}" required>
		<label>Payment Method</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! Form::select('status_id', App\Models\Order\Status::lists('name', 'id'), Admin::inputValue('status_id'), ['class' => 'md-input']) !!}
		<label>Status</label>
	</div>
</div>