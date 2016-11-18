<div class="col-sm-12">
	<div class="md-form-group">
		<input name="name" disabled="true" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}">
		<input name="branch_id" id="branchId" type="hidden" class="md-input" id="label1" value="{{ Admin::inputValue('id') }}">
		<label>Branch Name</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		<table><tr><td width="150px" align="center">City</td><td align="center" width="50px">Action</td></tr>
		<?php $branches = App\Models\Branch\Coverage::where('branch_id', Admin::inputValue('id'))->get(); ?>
			@foreach($branches as $row)
			<tr><td>{{ $row->city->name }}</td><td><span><button type="button" value="{{ $row->id }}" class="remove_branch_city">Hapus</button></span></td></tr>
			@endforeach
		</table>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		{!! \Form::select('province_id', ['Filter by Province']+\App\Models\Province::lists('name', 'id')->toArray(), Input::get('provinceId'), ['class' => 'md-input', 'id' => 'chooseProvince']) !!}
		<label>Filter by Province</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		{{-- <input name="search" id="citySearch" value="{{ Input::get('search') }}" type="text" class="md-input search" id="label1"> --}}
		{{-- <button id="buttonSearch" type="button">Find</button> --}}
		{!! Form::select('city_id', \App\Models\City::where('province_id', Input::get('provinceId'))->whereNotIn('id', App\Models\Branch\Coverage::lists('city_id'))->lists('name', 'id')->toArray(), Admin::inputValue('city_id'), ['class' => 'md-input', 'id' => 'cityId']) !!}<button id="buttonAdd" type="button">Add</button>
		<label>Add City</label>
	</div>
</div>