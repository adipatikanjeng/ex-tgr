<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}">
		<label>Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="code" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('code') }}">
		<label>Code</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="lat" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('lat') }}">
		<label>Latitude</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="long" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('long') }}">
		<label>Longitude</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="desc" class="md-input summernote" required>{!! Admin::inputValue('desc') !!}</textarea>
		<label>Description</label>
	</div>
</div>