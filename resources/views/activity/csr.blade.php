@extends('activity')
@section('content_activity')
<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/activities') }}">Activities</a><span> / </span>
	<a href="{{ url(App::getLocale().'/activities/events') }}">Our CSR Activities</a>
</div>

<h2>
	Our CSR Activities
</h2>

<div class="list_activities ">
	@if ($rows)
	@foreach ($rows as $row)
	<div class="box after_clear">
		<div class="image">
			@if(is_file(public_path('contents/'.$row->img)))
			<img style="max-width:200px" src="{{ asset('contents/'.$row->img) }}" alt="{{ $row->img }}" />
			@else
			<img style="max-width:200px" src="{{ asset('images/material/noimage.png') }}" alt="noimage" />
			@endif
		</div>
		<div class="text">
			<h5>{{ Site::lang($row, 'name') }}</h5>
			<p>{{ Site::lang($row, 'short_desc') }}</p>
			@if ($row->is_seminar == 'Y')
			<a href="{{ url(App::getLocale().'/activities/csr/'.$row->id.'/'.str_slug(Site::lang($row, 'name'))) }}" class="readmore type_2" >Join Seminar</a>
			@else
			<a href="{{ url(App::getLocale().'/activities/csr/'.$row->id.'/'.str_slug(Site::lang($row, 'name'))) }}" class="readmore type_2" >View Detail</a>
			@endif
		</div>
	</div>
	@endforeach
	@endif
</div>
@include('pagination.default', ['paginator' => $rows])

@endsection