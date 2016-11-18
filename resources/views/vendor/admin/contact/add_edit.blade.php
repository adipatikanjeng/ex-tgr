<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}">
		<label>Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="email" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('email') }}">
		<label>Email</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="telephone" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('telephone') }}">
		<label>Telephone</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="city" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('city') }}">
		<label>City</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="zip_code" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('zip_code') }}">
		<label>Zip Code</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="subject_id" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('subject->name') }}">
		<label>Subject</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="source" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('source->name') }}">
		<label>Source</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="optional" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('optional') }}">
		<label>Optional</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
	<textarea name="message" disabled="true" disabled="true" class="md-input" rows="5" id="label2" required>{{ Admin::inputValue('message') }}</textarea>
		<label>Message</label>
	</div>
</div>