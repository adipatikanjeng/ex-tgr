<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('product_id', \App\Models\Product::lists('name', 'id'), Admin::inputValue('product_id'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Product</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('type', ['Left Image' => 'Left Image', 'Right Image' => 'Right Image', 'White Box' => 'White Box', 'Bottom Box' => 'Bottom Box'], Admin::inputValue('type'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Type</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<textarea name="content_words" class="md-input summernote" required>{!! Admin::inputValue('content_words') !!}</textarea>
		<label>Description En</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<textarea name="content_words_locale_id" class="md-input summernote" required>{!! Admin::inputValue('content_words_locale_id') !!}</textarea>
		<label>Description Id</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		@if (Input::get('id') && Admin::inputValue('content_image'))
		<p>
			{!! HTML::image(asset('contents/'.Admin::inputValue('content_image')), Admin::inputValue('content_image'), array('width' => 100)) !!}
		</p><br/>
		@endif
		{!! \Form::file('content_image', ['class' => 'md-input']) !!}
		<label for="label1">Image</label>
	</div>
</div>
