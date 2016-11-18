@extends('layouts.master')
@section('content')<section class="banner">
<img src="{{ asset('contents/'.$headers->where('code', 'product')->first()->img) }}" alt="banner about" />
<div class="title">
	<h2 class="inner">{{ trans('global.products') }}</h2>
</div>
</section>

<section class="content_std">
	<div class="bg_title"></div>
	<div class="bg_side"></div>
	<div class="border_breadcrumb"></div>
	@if(Request::segment(5) != null)
	<div class="bg_prod_detail"></div>
	@endif
	<div class="wrapper">
		<div class="side">
			<nav>
				@foreach($categories as $category)
				<a href="{{ url(App::getLocale().'/products/'.$category->permalink) }}" class="<?=(Request::segment(4) == $category->id) ? 'active' : ''?>">{!! Site::lang($category, 'name') !!}
				</a>
				@if(Request::segment(3) == str_slug($category->permalink))
				<div class="acc_list">
					<ul>
						@foreach($category->products()->where('is_active', 'Y')->get() as $childRow)
						<li>
							<a class="<?=(Request::segment(4) == $childRow->id) ? 'active' : ''?>" href="{{ url(App::getLocale().'/products/'.$category->permalink.'/'.$childRow->id.'/'.str_slug($childRow->name)) }}">{{ $childRow->name }}
							</a>
						</li>
						@endforeach
					</ul>
				</div>
				@endif
				@endforeach
				<a class="<?=(Request::segment(2) == 'testimonies') ? 'active' : ''?>" href="{{ url(App::getLocale().'/testimonies') }}">Testimonial
				</a>
			</nav>

			@include('partial.side_menu_bottom')

		</div>
		<div class="inner_content">
			@yield('content_product')

			@include('partial.social_share')

		</div>
	</div>
</section>
@endsection