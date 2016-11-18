 @extends('about')
 @section('content_about')
 <div class="breadcrumb">
    <a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
    <a href="{{ url(App::getLocale().'/about-us') }}">About Us</a><span> / </span>
    <a href="{{ url(App::getLocale().'/about-us/awards') }}">Awards</a><span> / </span>
    <a href="">{{ Site::lang($row, 'title') }}</a>

</div>
<h2>
    {{ Site::lang($row, 'title') }}
</h2>
    {!! Site::lang($row, 'content') !!}

@endsection
