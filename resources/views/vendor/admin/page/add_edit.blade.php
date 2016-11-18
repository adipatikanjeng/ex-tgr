<div class="col-sm-4">
	<div class="md-form-group">
		<input name="title" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('title') }}">
		<label>Title En</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="title_locale_id" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('title_locale_id') }}">
		<label>Title Id</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="content" class="md-input summernote" rows="5" id="label2" required>{{ Admin::inputValue('content') }}</textarea>
		<label>Content En</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="content_locale_id" class="md-input summernote" rows="5" id="label2" required>{{ Admin::inputValue('content_locale_id') }}</textarea>
		<label>Content Id</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="code" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('code') }}">
		<label>Code</label>
	</div>
</div>
