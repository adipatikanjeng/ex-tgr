<div class="col-sm-4">
	<div class="md-form-group">
		<input name="title" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('title') }}">
		<label>Title</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="link_title" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('link_title') }}">
		<label>Title Link</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="link" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('link') }}">
		<label>Link</label>
	</div>
</div>
<div class="col-sm-6">
	<label for="label1">Icon</label>
	@if (Input::get('id') && Admin::inputValue('img'))
	<p>
		{!! HTML::image(asset('contents/'.Admin::inputValue('img')), Admin::inputValue('img'), array('width' => 100)) !!}
	</p><br/>
	@endif
	{!! \Form::file('img') !!}
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_display', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_display'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Is Active</label>
	</div>
</div>
