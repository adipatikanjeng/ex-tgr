@extends('article')
@section('content_article')
<div class="breadcrumb breadcrumb_articles">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/articles') }}">Articles</a><span> / </span>
	<a href="{{ url(App::getLocale().'/articles/child-development') }}">{!! Site::lang($row->category, 'name') !!}</a><span> / </span>
	<a href="">{!! Site::lang($row, 'title') !!}</a>
</div>

<h2>
	{!! Site::lang($row, 'title') !!}
</h2>

<div class="list_articles_detail ">
	<div class="box after_clear">
		<div class="image">
			<img src="{{ asset('contents/'.$row->img) }}" alt="{{ $row->img }}" />
		</div>
		<div class="text">
			<p>
				{!! Site::lang($row, 'content') !!}
			</p>
		</div>
	</div>
</div>

@include('partial.social_share')


<div class="border_comment_articles" style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
<div class="comment comment_articles after_clear">
	<h5>{{ $comments->get()->count() }} Comments</h5>
	<form action="{{ url(App::getLocale().'/articles/comment') }}" method="POST">
		{!! csrf_field() !!}
		<div class="row_input">
			<div class="col_input" style="height:300px">
				<input type="hidden" name="article_id" value="{{ $row->id }}">
				<textarea rows="8" name="content" required></textarea>
				<div class="comment_footer">
					<div class="info_char">500 character left</div>
					<div class="send"><button type="submit" class="btn_std_dis" style="width:100%;">Kirim Komentar</button></div>
				</div>

				<!--Add style="display:none" if user is login-->
				@if(!Auth::check())
				<div class="info_login">Please <a href="{{ url(App::getLocale().'/customers/auth/login') }}">login</a> to write comment.</div>
				@endif
				<!--Add style="display:none" if user is login-->
			</div>

		</div>

	</form>
	@if (Session::has('message'))
	<h5>{{ Session::get('message') }}</h5>
	@endif
	<div class="before_clear" style="padding: 20px 0 10px 0;"></div>
</div>

<div class="list_comment list_comment_articles">
	@foreach($comments->paginate(5) as $row)
	<div class="box after_clear">
		<div class="image">
			<img src="{{ asset('images') }}/content/avatar.jpg" alt="product" />
		</div>
		<div class="text">
			<h5>
				{{ $row->user->first_name.' '.$row->user->last_name }}
			</h5>
			<div class="date">{{ Carbon::create($row->create_at)->toDayDateTimeString() }}</div>
			<p>
				{{ $row->content }}
			</p>
		</div>
	</div>
	@endforeach
	@include('pagination.default',['paginator'=>$comments->paginate(5)])
</div>
@endsection