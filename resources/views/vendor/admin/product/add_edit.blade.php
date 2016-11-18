<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('category_id', \App\Models\Product\Category::lists('name', 'id'), Admin::inputValue('category_id'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Category *</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="code" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('code') }}" required>
		<label>Code *</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}" required>
		<label>Name *</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="short_desc" class="md-input" required>{!! Admin::inputValue('short_desc') !!}</textarea>
		<label>Short Description En *</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="short_desc_locale_id" class="md-input" required>{!! Admin::inputValue('short_desc_locale_id') !!}</textarea>
		<label>Short Description Id *</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="desc" class="md-input summernote" required>{!! Admin::inputValue('desc') !!}</textarea>
		<label>Description En *</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<textarea name="desc_locale_id" class="md-input summernote" required>{!! Admin::inputValue('desc_locale_id') !!}</textarea>
		<label>Description Id *</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="stock" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('stock') }}" required>
		<label>Stock *</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="youtube_link" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('youtube_link') }}">
		<label>Youtube Link</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="weight" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('weight') }}" required>
		<label>Weight (gram) *</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="volume" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('volume') }}">
		<label>Volume (cm) </label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_sale', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_sale'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Is Sale *</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_e_commerce', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_e_commerce'), ['class' => 'md-input', 'required' => true]) !!}
		<label>Is E Commerce Product *</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_popular', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_popular'), ['class' => 'md-input']) !!}
		<label>Is Populer</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_active', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_active'), ['class' => 'md-input']) !!}
		<label>Is Active</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_group', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_group'), ['class' => 'md-input']) !!}
		<label>Is Group</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_kp_online', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_kp_online'), ['class' => 'md-input']) !!}
		<label>Is KP Online</label>
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