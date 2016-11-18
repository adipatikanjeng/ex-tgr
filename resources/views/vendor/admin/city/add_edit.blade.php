<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}">
		<label>Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('category_id', \App\Models\Province::lists('name', 'id'), null, ['class' => 'md-input', 'required' => true]) !!}
		<label>Province</label>
	</div>
</div>