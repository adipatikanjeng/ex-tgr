<div class="col-sm-4">
	<div class="md-form-group">
	{!! Form::select('branch_id', App\Models\Branch::lists('name', 'id'), null, ['class' => 'md-input']) !!}
		<label>Branch</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="name" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('name') }}" required>
		<label>Name</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="email" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('email') }}" required>
		<label>Email</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="username" type="text" class="md-input" id="label1" value="{{ Admin::inputValue('user->email') }}" required>
		<label>Username</label>
	</div>
</div>
<div class="col-sm-4">
	<div class="md-form-group">
		<input name="password" type="password" class="md-input" id="label1" required>
		<label>Password</label>
	</div>
</div>
<input name="user_id" type="hidden" class="md-input" value="{{ Admin::inputValue('user_id') }}" id="label1">