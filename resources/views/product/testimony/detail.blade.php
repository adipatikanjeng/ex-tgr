@extends('product')
@section('content_product')
<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/testimonies') }}">Testimonial</a><span> / </span>
	<a href="">{{ $row->name }}</a>
</div>

<div class="list_product ">
<div class="box after_clear">
		<div class="image">
			<img src="{{ asset('contents/'.$row->img) }}" alt="product" />
		</div>
		<div class="text">
			<h5>
				{!! Site::lang($row, 'name') !!}<br/>
				{!! Site::lang($row, 'short_desc') !!}
			</h5>
			<p>
				{!! Site::lang($row, 'content') !!}
			</p>

		</div>
	</div>
	@foreach($testimonies as $row)
	<div class="box after_clear">
		<div class="image">
			<img src="{{ asset('contents/'.$row->img) }}" alt="product" />
		</div>
		<div class="text">
			<h5>
				{!! Site::lang($row, 'name') !!}<br/>
				{!! Site::lang($row, 'short_desc') !!}
			</h5>
			<p>
				{!! Site::lang($row, 'content') !!}
			</p>

		</div>
	</div>
	@endforeach
</div>
@include('pagination.default', ['paginator' => $testimonies])
@endsection