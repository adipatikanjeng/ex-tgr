@extends('activity')
@section('content_activity')
<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'activities') }}">Activities</a><span> / </span>
	<a href="{{ url(App::getLocale().'activities') }}">CSR Activities</a><span> / </span>
	<a>{{ Site::lang($row, 'name') }}</a>
</div>

<h2>
	{{ Site::lang($row, 'name') }}
</h2>
<p>{{ Site::lang($row, 'short_desc') }}</p>

<div class="list_activities_detail ">
	<div class="box after_clear">
		<div class="image">
			@if(is_file(public_path('contents/'.$row->img)))
			<img src="{{ asset('contents/'.$row->img) }}" alt="{{ $row->img }}" />
			@else
			<img src="{{ asset('images/material/noimage.png') }}" alt="" />
			@endif
		</div>
		<div class="text">
			{!! Site::lang($row, 'desc') !!}
		</div>
	</div>
</div>
<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
<div class="comment after_clear">
	<h5>{{ ($comments->count()) }} Comments</h5>
	<form action="{{ url(App::getLocale().'/activities/comment') }}" method="POST">
		{!! csrf_field() !!}
		<div class="row_input">
			<div class="col_input" style="height:300px">
				<input type="hidden" name="csr_activity_id" value="{{ $row->id }}">
				<textarea rows="8" name="content"></textarea>
				<div class="comment_footer">
					<div class="info_char">500 character left</div>
					<div class="send">
						<button type="submit" class="btn_std_dis" style="width:100%;">Kirim Komentar</button>
					</div>
				</div>
				@if(!Auth::check())
				<div class="info_login">Please <a href="{{ url(App::getLocale().'/customers/auth/login') }}">login</a> to write comment.</div>
				@endif
			</div>
		</div>
	</form>
	@if (Session::has('message'))
	<h5>{{ Session::get('message') }}</h5>
	@endif
	<div class="before_clear" style="padding: 20px 0 10px 0;"></div>
</div>

@if ($comments)
<div class="list_comment">
	@foreach ($comments as $comment)
	<div class="box after_clear">
		<div class="image">
			<img src="{{ asset('images') }}/content/avatar.jpg" alt="product" />
		</div>
		<div class="text">
			<h5>{{ $comment->user->first_name }}</h5>
			<div class="date">{{ date('j F Y', strtotime($comment->created_at)).' at '.date('g:i a', strtotime($comment->created_at)) }}</div>
			<p>{{ $comment->content }}</p>
		</div>
	</div>
	@endforeach
</div>
@endif
@endsection