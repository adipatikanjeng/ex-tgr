<div class="account_form form_account after_clear" style="margin:40px 0 0 0">
	@if($msg = $errors->first())
	<h2>{{ $msg }}</h2>
	@endif
	@if (Session::has('message'))
	<h2>{{ Session::get('message') }}</h2>
	@endif
</div>