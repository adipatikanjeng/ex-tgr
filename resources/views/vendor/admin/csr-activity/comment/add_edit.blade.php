<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('event->title') }}">
		<label>Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" disabled="true" class="md-input" id="label1" value="{{ Admin::inputValue('user->first_name') }}">
		<label>Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		{!! \Form::select('is_display', ['N' => 'No', 'Y' => 'Yes'], Admin::inputValue('is_display'), ['class' => 'md-input']) !!}
		<label for="label0">Is Display?</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<textarea name="content" class="md-input" disabled="true">{!! Admin::inputValue('content') !!}</textarea>
		<label>Content</label>
	</div>
</div>
