<div class="col-sm-4">
    <div class="md-form-group">
    {!! \Form::select('pricelist_code', \App\Models\Product\Pricelist::groupBy('code')->lists('code', 'code'), Admin::inputValue('pricelist_code'), ['class' => 'md-input', 'required' => true]) !!}
        <label>Code</label>
    </div>
</div>
<div class="col-sm-4">
    <div class="md-form-group">
        <input name="start_date" type="text" class="md-input datepicker" id="label1" value="{{ Admin::inputValue('start_date') }}" required>
        <label>Start Date</label>
    </div>
</div>
<div class="col-sm-4">
    <div class="md-form-group">
        <input name="end_date" type="text" class="md-input datepicker" id="label1" value="{{ Admin::inputValue('end_date') }}" required>
        <label>End Date</label>
    </div>
</div>