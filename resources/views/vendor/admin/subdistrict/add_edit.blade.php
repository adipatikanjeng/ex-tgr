<div class="col-sm-6">
	<div class="md-form-group">
		<input name="postal_code" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('postal_code') }}">
		<label>Postal Code</label>
	</div>
</div>
<div class="col-sm-6">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}">
		<label>Subdistrict Name</label>
	</div>
</div>
<div class="col-sm-6">
    <div class="md-form-group">
    {!! \Form::select('city_id', \App\Models\City::lists('name', 'id'), Admin::inputValue('city_id'), ['class' => 'md-input', 'required' => true]) !!}
        <label>Cities</label>
    </div>
</div>