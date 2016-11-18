<div class="col-sm-6">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}" required>
		<label>Title En</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<input name="name_locale_id" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name_locale_id') }}" required>
		<label>Title Id</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="short_desc" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('short_desc') }}" required>
		<label>Short Description En</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="short_desc_locale_id" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('short_desc_locale_id') }}" required>
		<label>Short Description Id</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="publish_date" type="text" class="md-input datepicker" data-value="{{ Admin::inputValue('publish_date') }}" id="label1" value="{{ Admin::inputValue('publish_date') }}" required>
		<label>Publish Date</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="desc" class="md-input summernote" required>{!! Admin::inputValue('desc') !!}</textarea>
		<label>Description En</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="desc_locale_id" class="md-input summernote" required>{!! Admin::inputValue('desc_locale_id') !!}</textarea>
		<label>Description Id</label>
	</div>
</div>
<div class="col-sm-6">
	<label for="label1">Image</label>
	@if (Input::get('id') && Admin::inputValue('img'))
	<p>
		{!! HTML::image(asset('contents/'.Admin::inputValue('img')), Admin::inputValue('img'), array('width' => 100)) !!}
	</p><br/>
	@endif
	{!! \Form::file('img') !!}
</div>