@extends('contact')
@section('content_contact')
<div class="breadcrumb breadcrumb_account">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/contact-us') }}">{{ trans('global.contact-us') }}</a><span> / </span>
	<a href="">{{ trans('global.address') }}</a>
</div>
<h2>
	{{ trans('global.address') }}
</h2>

<div class="wrap_branches">
	<div id="map">

	</div>
</div>

<div class="account_form" style="margin:40px 0 0px 0">
	<h2 style="margin:0px 0 10px 0">Jakarta / Head Office</h2>
	<p>
		Gedung Sucofindo Lt. 14<br/>
		Jl. Raya Pasar Minggu Kav. 34 Pancoran, Jakarta Selatan - 12780<br/>
		Telp. (021) 791 80888
	</p>
</div>
<script src="http://maps.googleapis.com/maps/api/js?v=3.21"></script>
<script>
	branchesMap({
		element: $(".wrap_branches #map")
	});
</script>
@endsection