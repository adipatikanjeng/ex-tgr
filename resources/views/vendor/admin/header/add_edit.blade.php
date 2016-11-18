<div class="col-sm-4">
	<div class="md-form-group">
		<input name="code" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('code') }}">
		<label>Code</label>
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