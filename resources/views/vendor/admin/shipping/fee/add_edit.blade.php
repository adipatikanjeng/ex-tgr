<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('city_id', \App\Models\City::lists('name', 'id'), null, ['class' => 'md-input', 'required' => true]) !!}
		<label>Cities</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="cost" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('cost') }}" required>
		<label>Cost</label>
	</div>
</div>
