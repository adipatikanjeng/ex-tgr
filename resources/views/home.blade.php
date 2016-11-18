@extends('layouts.master')
@section('content')
<section class="banner">
    <ul class="slider">
        @foreach($slider as $row)
        <li>
            <p>{!! Site::lang($row, 'caption') !!}</p>
            <a href="{{ url($row->url) }}"><img src="{{ asset('contents/'.$row->img) }}" alt="{{ $row->img }}"/></a>
        </li>
        @endforeach
    </ul>
</section>


<section class="content home">

    <div class="management">
        <div class="wrapper">
            <div class="video left">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $content['youtube'] }}" frameborder="0" allowfullscreen></iframe>
                   <!--  <div class="cover">
                        <img src="images/content/video_cover.jpg" />
                        <img src="images/material/play_ico.png" alt="play"  class="ico"/>
                    </div> -->
                </div>
                <div class="right">
                    <h2>{{ $content['our-management']['title'] }}</h2>
                    <p>{{ $content['our-management']['content']}}</p>
                    <a href="{{ url(App::getLocale().'/about-us') }}" class="btn_std">Learn More About Us</a>
                </div>
            </div>
        </div>

        <div class="popularseries">
            <div class="wrapper box_slide_popularseries">
                <h2>{!! trans('home.most-popular-series') !!}</h2>
                <div class="caraousel">
                    @foreach($popularSeries as $row)
                    <div class="slide after_clear">
                        <div class="left">
                            <h4>{{ $row->name }}</h4>
                            <p>{!! Str::words(Site::lang($row, 'short_desc'),15) !!}</p>
                            <a href="{{ url(App::getLocale().'/products/'.$row->category->permalink.'/'.$row->id."/".str_slug($row->name)) }}" class="btn_std" style="margin: 38px!important;">
                                @if($row->is_sale == 'Y')
                                <img src="images/material/ico_buy.png"/>
                                Buy Now!
                                @else
                                <img src="images/material/ico_contact.png"/>
                                Contact Us!
                                @endif
                            </a>
                        </div>
                        <div class="right">
                            @if(is_file(public_path('contents/'.$row->img)))
                            <img style="max-width:380px;" src="{{ asset('contents/'.$row->img) }}" alt="{{ $row->name }}" />
                            @else
                            <img style="max-width:380px;" src="{{ asset('images/material/noimage.png') }}" alt="noimage" />
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="testimonial">
            <div class="wrapper">
                <h2>What Customers Says About Us</h2>
                <p class="text-testimonial">Sebuah kebanggan dan kehormatan bagi kami dapat mengoptimalkan peran orangtua melalui aktivitas belajar di rumah sejak usia dini melalui program-program terbaik dan pelayanan yang mengesankan di tengah-tengah keluarga Anda.</p>
                @foreach($testimonies as $row)
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('contents/'.$row->img) }}" alt="{{ $row->name }}"/>
                    </div>
                    <h5>{{ $row->name }}</h5>
                    <p> {!! Str::words(Site::lang($row, 'content'), 20) !!} </p>
                    <a href="{{ url(App::getLocale().'/testimonies/'.$row->id.'/'.str_slug($row->name)) }}" class="readmore">Read more</a>
                </div>
                @endforeach
                <div class="clear"></div>
            </div>

        </div>

        <div class="events">
            <div class="wrapper">
                <h2>{{ trans('home.our-events') }}</h2>
                <div class="caraousel">
                    @foreach($events as $row)
                    <div class="slide ">
                        <div class="box after_clear">
                            <div class="left">
                                <img src="{{ asset('contents/'.$row->img) }}" />
                            </div>
                            <div class="right">
                                <h6>{{ Site::lang($row, 'name') }}</h6>
                                {!! Str::words(Site::lang($row, 'home_display'), 50) !!}
                            </div>&nbsp;&nbsp;
                            @if($row->is_seminar == 'Y')
                            <a href="{{ url(App::getLocale().'/activities/events/'.$row->id.'/'.str_slug(Site::lang($row, 'name'))) }}" class="readmore">Join Seminar</a>
                            @else
                            <a href="{{ url(App::getLocale().'/activities/events/'.$row->id.'/'.str_slug(Site::lang($row, 'name'))) }}" class="readmore">View Detail</a>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="req seminar">
            <div class="wrapper">
                <h2>{{ trans('home.request-for-seminar') }}</h2>
                <p>{{ trans('home.request-for-seminar-desc') }}.</p>
                <a href="{{ url(App::getLocale().'/seminars') }}" class="btn_std">Invite Us</a>
            </div>
        </div>

        <div class="csr">
            <div class="wrapper">
                <div class="left">
                    <h2>{{ trans('home.our-csr-activities') }}</h2>
                    <p>{{ trans('home.our-csr-activities-desc') }}</p>

                    <h5>{{ trans('home.our-activities') }}</h5>
                    <div class="caraousel">
                        @foreach($csrActivities as $row)
                        <div class="slide"><a href="{{ url(App::getLocale().'/activities/csr/'.$row->id.'/'.str_slug(Site::lang($row, 'name'))) }}"><img style="max-height:75px" src="{{ asset('contents/'.$row->img) }}" /></a></div>
                        @endforeach

                    </div>
                    <a href="{{ url(App::getLocale().'/activities/csr') }}" class="readmore">View All CSR Activities</a>
                </div>
                <img src="{{ asset('contents/'.$headers->where('code', 'home-csr-activities')->first()->img) }}" alt="" class="bg" />
            </div>
        </div>

        <div class="req team">
            <div class="wrapper">
                <h2>Join Our Team</h2>
                <p>
                    Jadikan diri Anda bermanfaat untuk orang lain,<br/>
                    miliki kebebasan waktu, finansial,<br/>
                    dan dapatkan penghasilan yang luar biasa!!
                </p>
                <a href="{{ url(App::getLocale().'/join-our-team') }}" class="btn_std">View All Opportunity</a>
            </div>
        </div>

    </section>
    @endsection