<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}" required>
		<label>Name</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="content" class="md-input" required>{!! Admin::inputValue('content') !!}</textarea>
		<label>Content En</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="content_locale_id" class="md-input" required>{!! Admin::inputValue('content_locale_id') !!}</textarea>
		<label>Content Id</label>
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
		<label>Image</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="order" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('order') }}" required>
		<label>Order</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_active', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_active'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Is Active</label>
	</div>
</div>