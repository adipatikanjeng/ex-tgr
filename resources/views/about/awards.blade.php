@extends('about')
@section('content_about')
<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/about-us') }}">About Us</a><span> / </span>
	<a href="">Awards</a>
</div>

<h2>
	Awards
</h2>

<div class="list_awards after_clear">
	@foreach($rows as $row)
	<div class="box">
		<div class="image">

		@if(is_file(public_path('contents/'.$row->img)))
		<img src="{{ asset('contents/'.$row->img) }}" alt="award "/>
		@else
		<img src="{{ asset('images/material/noimage.png') }}" alt="award "/>
		@endif
		</div>
		<h5>{{ Site::lang($row, 'title') }}</h5>
		<a href="{{ url(App::getLocale().'/about-us/awards/'.$row->id.'/'.str_slug(Site::lang($row, 'title'))) }}" class="readmore type_2" >Read More</a>
	</div>
	@endforeach
</div>
@include('pagination.default', ['paginator' => $rows])
@endsection
img_awards-qrcrXuI3dIFYvi5w.JPG