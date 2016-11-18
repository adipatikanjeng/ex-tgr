@extends('product')
@section('content_product')
<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="">Product</a>
</div>

<h2>
	Principal
</h2>

<div class="list_product ">
	@foreach($rows as $row)
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
				{!! Site::lang($row, 'desc') !!}
			</p>
			<a href="{{ url(App::getLocale().'/products/'.$row->permalink) }}" class="readmore type_2" >View Products</a>
		</div>
	</div>
	@endforeach
</div>
@include('pagination.default',['paginator'=>$rows])
@endsection