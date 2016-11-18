<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('user->profile->rm_name') }}">
		<label>EPC Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('name') }}">
		<label>Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="gender" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('gender') }}">
		<label>Sex</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="office" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('office') }}">
		<label>Office</label>
	</div>
</div>
<div class="col-sm-8">
	<div class="md-form-group">
		<input name="office_address" class="md-input" disabled="true" value="{!! Admin::inputValue('office_address') !!}" >
		<label>Office Address</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="floor" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('floor') }}">
		<label>Floor</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="position" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('position') }}">
		<label>Position</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="office_telephone" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('office_telephone') }}">
		<label>Office Telephone</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="mobile_phone" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('mobile_phone') }}">
		<label>Mobile Phone</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="email" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('email') }}">
		<label>Email</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="home_address" class="md-input" disabled="true" value="{!! Admin::inputValue('home_address') !!}">
		<label>Home Address</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="home_telephone" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('home_telephone') }}">
		<label>Home Telephone</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="postal_code" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('postal_code') }}">
		<label>Postal Code</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="shipping_address" disabled="true" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('shipping_address') }}">
		<label>Shipping Address</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="receivable_address" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('receivable_address') }}">
		<label>Receivable Address</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="file_transfer" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('file_transfer') }}">
		<label>File Transfer</label>
	</div>
	Download File <a href="{{ asset('contents/'.Admin::inputValue('file_transfer')) }}" target="_blank">{{ Admin::inputValue('file_transfer') }}</a>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="id_card" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('id_card') }}">
		<label>KTP</label>
	</div>
	Download File <a href="{{ asset('contents/'.Admin::inputValue('id_card')) }}" target="_blank">{{ Admin::inputValue('id_card') }}</a>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="ownership_program" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('ownership_program') }}">
		<label>Owenership Programs</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="total_investment" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('total_investment') }}">
		<label>Total Investment</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="initial_investment" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('initial_investment') }}">
		<label>Initial Investment</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="residual_investment" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('residual_investment') }}">
		<label>Residual Investment</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="month_investment" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('month_investment') }}">
		<label>Month Investment</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="meried_couple" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('meried_couple') }}">
		<label>Meried Couple</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="mc_office" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('mc_office') }}">
		<label>Meried Couple Office</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="mc_office_address" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('mc_office_address') }}">
		<label>Meried Couple Office Address</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="mc_position" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('mc_position') }}">
		<label>Meried Couple Office Position</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="relatives_name" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('relatives_name') }}">
		<label>Relatives Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="relatives_telephone" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('relatives_address') }}">
		<label>Relatives Telephone</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="home_status" type="text" class="md-input" disabled="true" id="label1" value="{{ Admin::inputValue('home_status') }}">
		<label>Home Status</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="cc_number" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('cc_number') }}">
		<label>Credit Card Number</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="cc_valid_date" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('cc_valid_date') }}">
		<label>Credit Card Valid Date</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="reference_source" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('reference_source') }}">
		<label>Reference Source</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="status" type="text" class="md-input" id="label1" disabled="true" value="{{ Admin::inputValue('status') }}">
		<label>Status</label>
	</div>
</div>