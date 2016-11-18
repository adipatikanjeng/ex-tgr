<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('category_id', \App\Models\Article\Category::lists('name', 'id'), null, ['class' => 'md-input', 'required' => true]) !!}
		<label>Category</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
	<input name="title" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('title') }}" required>
		<label>Title En</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
	<input name="title_locale_id" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('title_locale_id') }}" required>
		<label>Title Id</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
	<input name="short_desc" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('short_desc') }}" required>
		<label>Short Desc En</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
	<input name="short_desc_locale_id" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('short_desc_locale_id') }}" required>
		<label>Short Desc Id</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
	<textarea name="content" class="md-input summernote" required>{!! Admin::inputValue('content') !!}</textarea><label>Content En</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
	<textarea name="content_locale_id" class="md-input summernote" required>{!! Admin::inputValue('content_locale_id') !!}</textarea><label>Content Id</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
	@if (Input::get('id') && Admin::inputValue('img'))
	<p>
		{!! HTML::image(asset('contents/'.Admin::inputValue('img')), Admin::inputValue('img'), array('width' => 100)) !!}
	</p><br/>
	@endif
	{!! \Form::file('img', ['class' => 'md-input']) !!}
	<label for="label1">Image</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_display', ['Y' => 'Yes', 'N' => 'No'], Admin::inputValue('is_display'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Is Display</label>
	</div>
</div>