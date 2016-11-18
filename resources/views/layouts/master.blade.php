<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ $contact['name'] }} </title>
    {!! $contact['meta'] !!}
    <meta name="description" content="">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <link rel="icon" href="favicon.ico">

    <!--Style-->
    <link rel="stylesheet" href="{{ asset('css') }}/styles.css">
    <link rel="stylesheet" href="{{ asset('css') }}/jquery.bxslider.css">
    <link rel="stylesheet" href="{{ asset('css') }}/reset.css">
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/easy-responsive-tabs.css " />
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/easyTree.css " />
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/jquery-ui.css " />
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/jquery-ui-timepicker-addon.css " />

    <!--mediaQuery-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/stylemedia768.css" media="screen and (min-width:0px) and (max-width:1000px)"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/stylemedia480.css" media="screen and (min-width:0px) and (max-width:767px)"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/stylemedia320.css" media="screen and (min-width:0px) and (max-width:479px)"/>


    <!--js-->
    <script type="text/javascript" src="{{ asset('js') }}/jquery-1.11.2.min.js"></script>
    <script type="text/javascript"  src="{{ asset('js') }}/easyResponsiveTabs.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/TweenMax.min.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/js_lib.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/js_run.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ asset('js') }}/jquery-ui-timepicker-addon.js"></script>

    <script type="text/javascript" src="{{ asset('js') }}/scripts.js"></script>

    <script>
        function publicUrl(url){
            return "{{ url(App::getLocale()) }}/"+url;
        }
        function publicAssetContent(url){
            return "{{ asset('contents') }}/"+url;
        }
        function publicAsset(url){
            return "{{ asset(null) }}/"+url;
        }
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });
   </script>

   <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53608ca278177223" async="async"></script>


</head>
<body>
    <header>
        <div class="top">
            <div class="wrapper">
                <div class="left">
                    <a href="{{ str_replace('/id', '/en', Request::url()) }}">Eng</a><span>|</span>
                    <a href="{{ str_replace('/en', '/id', Request::url()) }}">Ind</a>
                </div>
                <div class="right">
                    @if(Auth::check() && !Auth::user()->epc && !Auth::user()->ss || !Auth::check())
                    <a class="cart" href="{{ url(App::getLocale().'/shopping-cart') }}">
                       <div id="myCart">
                         @include('partial.cart', ['totalCart' => $totalCart, 'items' => $items])
                     </div>
                 </a>
                 @endif
                 @if(Auth::check() && Auth::user()->customer)
                 <a class="user" href="{{ url(App::getLocale().'/customers/auth/logout') }}">
                    {{ Auth::user()->customer->name }} (Logout)
                </a>
                @elseif(Auth::check() && Auth::user()->epc)
                <a class="user" href="{{ url(App::getLocale().'/auth/logout') }}">
                    {{ ucwords(strtolower(@Auth::user()->epc->profile->rm_name)) }} (Logout)
                </a>
                @elseif(Auth::check() && Auth::user()->ss)
                <a class="user" href="{{ url(App::getLocale().'/sales/auth/logout') }}">
                    {{ ucwords(strtolower(@Auth::user()->ss->profile->name)) }} (Logout)
                </a>
                @endif
            </div>
        </div>
    </div>
    <div class="wrapper after_clear">
        <div class="logo">
            <a href="{{ url(App::getLocale()) }}">
                <img src="{{ asset('images') }}/material/logo.png" />
            </a>
        </div>
        <nav>
            <a href="{{ url(App::getLocale()) }}" class="<?=(Request::segment(2) == null ? 'active' : '')?>">
                <span><img src="{{ asset('images') }}/material/ico_menu1.png" alt="home"/></span>
                home
            </a>
            <a href="{{ url(App::getLocale().'/about-us') }}" class="<?=(Request::segment(2) == 'about-us' ? 'active' : '')?>">
                <span><img src="{{ asset('images') }}/material/ico_menu2.png" alt="{{ trans('global.about-us') }}"/></span>
                {{ trans('global.about-us') }}
            </a>
            <a href="{{ url(App::getLocale().'/products') }}" class="<?=(Request::segment(2) == 'products' ? 'active' : '')?>">
                <span><img src="{{ asset('images') }}/material/ico_menu3.png" alt="{{ trans('global.products') }}"/></span>
                {{ trans('global.products') }}
            </a>
            <a href="{{ url(App::getLocale().'/activities') }}" class="<?=(Request::segment(2) == 'activities' ? 'active' : '')?>">
                <span><img src="{{ asset('images') }}/material/ico_menu4.png" alt="{{ trans('global.activities') }}"/></span>
                {{ trans('global.activities') }}
            </a>
            <a href="{{ url(App::getLocale().'/articles') }}" class="<?=(Request::segment(2) == 'articles' ? 'active' : '')?>">
                <span><img src="{{ asset('images') }}/material/ico_menu5.png" alt="Articles"/>
                </span>
                {{ trans('global.article') }}
            </a>
            @if(Auth::check() && Auth::user()->customer)
            <a href="{{ url(App::getLocale().'/customers') }}" class="<?=(Request::segment(2) == 'customers') ? 'active' : '';?>">
                <span><img src="{{ asset('images') }}/material/ico_menu6.png" alt="{{ trans('global.my-account') }}"/></span>
                {{ trans('global.my-account') }}
            </a>
            @elseif(Auth::check() && Auth::user()->epc)
            <a href="{{ url(App::getLocale().'/my-account') }}" class="<?=(Request::segment(2) == 'my-account') ? 'active' : '';?>">
                <span><img src="{{ asset('images') }}/material/ico_menu6.png" alt="{{ trans('global.my-account') }}"/></span>
                {{ trans('global.my-account') }}
            </a>
            @elseif(Auth::check() && Auth::user()->ss)
            <a href="{{ url(App::getLocale().'/sales/profile') }}" class="<?=(Request::segment(2) == 'sales') ? 'active' : '';?>">
                <span><img src="{{ asset('images') }}/material/ico_menu6.png" alt="{{ trans('global.my-account') }}"/></span>
                {{ trans('global.my-account') }}
            </a>
            @else
            <a href="{{ url(App::getLocale().'/my-account') }}" class="<?=(Request::segment(2) == 'my-account') ? 'active' : '';?>">
                <span><img src="{{ asset('images') }}/material/ico_menu6.png" alt="{{ trans('global.my-account') }}"/></span>
                {{ trans('global.my-account') }}
            </a>
            @endif
            <a href="{{ url(App::getLocale().'/contact-us') }}" class="<?=(Request::segment(2) === 'contact-us') ? 'active' : '';?>">
                <span><img src="{{ asset('images') }}/material/ico_menu7.png" alt="{{ trans('global.contact-us') }}"/></span>
                {{ trans('global.contact-us') }}
            </a>
            <div class="top-mobile">
                <div class="lang">
                    <a href="{{ str_replace('/id', '/en', Request::url()) }}">Eng</a><span style="float:left">|</span>
                    <a href="{{ str_replace('/en', '/id', Request::url()) }}">Ind</a>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both"></div>
                @if(Auth::check() && !Auth::user()->epc || !Auth::check())
                <div class="cart">
                 <div id="cart">
                     @include('partial.cart', ['totalCart' => $totalCart, 'items' => $items])
                 </div>
             </div>
             @endif

         </div>
     </nav>
     <div class="mtoggle">
        <a href="">
            toggle mobile
        </a>
    </div>
</div>
</header>
@yield('content')
<footer>
    <div class="top">
        <div class="wrapper">
            <a href="{{ $socialMedia['facebook'] }}">
                <img src="{{ asset('images') }}/material/ico_fb.png" />
                <span>
                    <h6>Like us on Facebook</h6>
                    <h5>Tigaraksa Education</h5>
                </span>
            </a>
            <a href="{{ $socialMedia['twitter'] }}">
                <img src="{{ asset('images') }}/material/ico_tw.png" />
                <span>
                    <h6>Follow us on Twitter</h6>
                    <h5>Tigaraksa Education</h5>
                </span>
            </a>
            <a href="{{ $socialMedia['youtube'] }}">
                <img src="{{ asset('images') }}/material/ico_yt.png" />
                <span>
                    <h6>Subscribe us on Youtube</h6>
                    <h5>Tigaraksa Education</h5>
                </span>
            </a>
            <a href="{{ $socialMedia['instagram'] }}">
                <img src="{{ asset('images') }}/material/ico_inst.png" />
                <span>
                    <h6>Follow us on Instagram</h6>
                    <h5>Tigaraksa Education</h5>
                </span>
            </a>
        </div>
    </div>
    <div class="wrapper">
        <div class="left">
            <nav>
                <a href="{{ url(App::getLocale()) }}">Home</a>
                <a href="{{ url(App::getLocale().'/about-us') }}">{{ trans('global.about-us') }}</a>
                <a href="{{ url(App::getLocale().'/products') }}">{{ trans('global.products') }}</a>
                <a href="{{ url(App::getLocale().'/activities') }}">{{ trans('global.activities') }}</a>
                <a href="{{ url(App::getLocale().'/articles') }}">{{ trans('global.article') }}</a>
                <a href="{{ url(App::getLocale().'/my-account') }}">{{ trans('global.my-account') }}</a>
                <a href="{{ url(App::getLocale().'/contact-us') }}">{{ trans('global.contact-us') }}</a>
            </nav>

            <p class="foot">
                Copyright © {{ $contact['name'] }} 2015. All Rights Reserved
                Site by WEBARQ.
            </p>
        </div>
        <div class="right">
            <p>
                <b>{{ $contact['name'] }}</b><br/>
                {!! $socialMedia['address'] !!}
            </p>
            <a href=""> <img src="{{ asset('images') }}/material/ico_bb.png"  alt="bb"/>{{ $socialMedia['bbm'] }}</a>
            <a href=""> <img src="{{ asset('images') }}/material/ico_wa.png"  alt="bb"/>{{ $socialMedia['phone'] }}</a>
        </div>

    </div>
</footer>
<!--end of Footer -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72314135-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>