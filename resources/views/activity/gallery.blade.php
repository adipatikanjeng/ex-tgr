@extends('activity')
@section('content_activity')
<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/activities') }}">Activities</a><span> / </span>
	<a href="{{ url(App::getLocale().'/activities/galleries') }}">Galleries</a>

</div>

<h2>
	Galleries
</h2>

	@if ($rows)
		<div class="list_awards after_clear">
			@foreach ($rows as $row)
				<div class="box">
					<div class="image">
						@if(is_file(public_path('contents/'.$row->img)))
						<img src="{{ asset('contents/'.$row->img) }}" alt="{{ $row->img }}"/>
						@else
						<img src="{{ asset('images/material/noimage.png') }}" alt="noimage"/>
						@endif
					</div>
					<h5>{{ Site::lang($row, 'title') }}</h5>
					<a href="{{ url(App::getLocale().'/activities/galleries/'.$row->id.'/'.str_slug(Site::lang($row, 'title'))) }}" class="readmore type_2" >Read More</a>
				</div>
			@endforeach
		</div>
	@endif
@endsection