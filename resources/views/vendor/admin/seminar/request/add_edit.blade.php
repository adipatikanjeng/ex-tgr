<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}" required>
		<label>Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="email" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('email') }}" required>
		<label>Email</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="city" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('city') }}" required>
		<label>City</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="topic" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('topic->name') }}" required>
		<label>Topic</label>
	</div>
</div>