@extends('layouts.master')
@section('content')
<?php $page = 'about';?>
<!-- middle -->
<section class="banner">
	<img src="{{ asset('contents/'.$headers->where('code', 'article')->first()->img) }}" alt="banner about" />
	<div class="title">
		<h2 class="inner">Articles</h2>
	</div>
</section>

<section class="content_std">
	<div class="bg_title"></div>
	<div class="bg_side"></div>
	<div class="border_breadcrumb"></div>
	<div class="wrapper">
		<div class="side">

			<nav>
				@foreach(App\Models\Article\Category::all() as $row)
				<a class="<?=(Request::segment(3) == $row->permalink) ? 'active' : '' ?>" href="{{ url(App::getLocale().'/articles/'.$row->permalink) }}">{!! Site::lang($row, 'name') !!}
				</a>
				@endforeach

			</nav>

			@include('partial.side_menu_bottom')

		</div>
		<div class="inner_content">
			@yield('content_article')

			@if(Request::segment(4) == null)

			@include('partial.social_share')

			@endif

		</div>
	</div>
</section>
<!-- end of middle -->
@endsection