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
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="short_desc" class="md-input" required>{!! Admin::inputValue('short_desc') !!}</textarea>	<label>Short Desctiption En</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="short_desc_locale_id" class="md-input" required>{!! Admin::inputValue('short_desc_locale_id') !!}</textarea>	<label>Short Desctiption Id</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="desc" class="md-input" required>{!! Admin::inputValue('desc') !!}</textarea>
		<label for="label2">Description En</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="desc_locale_id" class="md-input" required>{!! Admin::inputValue('desc_locale_id') !!}</textarea>
		<label for="label2">Description En</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="publish_date" type="text" data-value="{{ Admin::inputValue('publish_date') }}" class="md-input datepicker" id="label1" value="{{ Admin::inputValue('publish_date') }}" required>
		<label for="label2">Publish Date</label>
	</div>
</div>
<div class="col-sm-12">
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