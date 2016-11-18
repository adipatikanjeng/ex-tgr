@extends('article')
@section('content_article')
<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/articles') }}">Articles</a><span> / </span>
	<a href="">{!! Site::lang($rows->first()->category, 'name' ) !!}</a>
</div>

<h2>
	{!! Site::lang($rows->first()->category, 'name' ) !!}
</h2>

<div class="list_articles after_clear">
	@foreach($rows as $row)
	<div class="box after_clear">
		<div class="image">
			<img src="{{ asset('contents/'.$row->img) }}" alt="{{ $row->img }}" />
		</div>
		<div class="text">
			<h5>
				{!! Site::lang($row, 'title') !!}
			</h5>
			<p>
				{!! Site::lang($row, 'short_desc') !!}
			</p>
			<a href="{{ url(App::getLocale().'/articles/'.$row->category->permalink.'/'.$row->id.'/'.str_slug(Site::lang($row, 'title'))) }}" class="readmore type_2" >Read More</a>
		</div>
	</div>
	@endforeach
	@include('pagination.default',['paginator'=>$rows])

	@endsection