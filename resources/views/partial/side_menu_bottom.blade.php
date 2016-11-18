@foreach($sideMenus as $row)
<div class="box after_clear">
	<div class="image">
		<img src="{{ asset('contents/'.$row->img) }}" alt="interested" />
	</div>
	<div class="text">
		<h4>{{ $row->title }}</h4>
		<a href="{{ url(App::getLocale().'/'.$row->link) }}" class="readmore type_2">{{ $row->link_title }}</a>
	</div>
</div>
@endforeach