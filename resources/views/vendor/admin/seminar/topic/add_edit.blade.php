<div class="col-sm-6">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}" required>
		<label>Name</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<input name="name_locale_id" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name_locale_id') }}" required>
		<label>Name Id</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<textarea name="desc" class="md-input" required>{!! Admin::inputValue('desc') !!}</textarea>
		<label>Desc</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
	<textarea name="desc_locale_id" class="md-input" required>{!! Admin::inputValue('desc_locale_id') !!}</textarea>
		<label>Topic</label>
	</div>
</div>