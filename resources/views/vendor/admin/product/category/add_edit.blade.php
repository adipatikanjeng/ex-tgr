<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}">
		<label>Name En</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name_locale_id" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name_locale_id') }}">
		<label>Name Id</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<input name="short_desc" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('short_desc') }}">
		<label>Short Description En</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<input name="short_desc_locale_id" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('short_desc_locale_id') }}">
		<label>Short Description Id</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<textarea name="desc" class="md-input summernote" required>{!! Admin::inputValue('desc') !!}</textarea>
		<label>Description En</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<textarea name="desc_locale_id" class="md-input summernote" required>{!! Admin::inputValue('desc_locale_id') !!}</textarea>
		<label>Description Id</label>
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