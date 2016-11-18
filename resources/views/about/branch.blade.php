@extends('about')
@section('content_about')
<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/about-us') }}">About Us</a><span> / </span>
	<a href="">Our Branches</a>
</div>

<h2>
	Our Branches
</h2>

<div class="wrap_branches">
	<div id="map">

	</div>
</div>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
	branchesMap({
		element: $(".wrap_branches #map")
	});
</script>
@endsection