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
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea class="md-input summernote" name="caption">{{ Admin::inputValue('caption') }}</textarea>
		<label>Caption En</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea class="md-input summernote" name="caption_locale_id">{{ Admin::inputValue('caption_locale_id') }}</textarea>
		<label>Caption Id</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="url" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('url') }}" required>
		<label>Url Link</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_display', ['Y' => 'Yes', 'N' => 'No'], null, ['class' => 'md-input', 'required' => true]) !!}
		<label>Is Display</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="order" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('order') }}" required>
		<label>Order</label>
	</div>
</div>