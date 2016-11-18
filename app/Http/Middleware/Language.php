<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\Middleware;

class Language implements Middleware {

    public function __construct(Application $app, Redirector $redirector, Request $request) {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->segment(1)!= 'admin'){
            $locale = $request->segment(1);
            $segments = $request->segments();
            if ( ! array_key_exists($locale, $this->app->config->get('app.locales'))) {
                $defaultLang = $this->app->config->get('app.fallback_locale');
                $segment = array_unshift($segments, $defaultLang);
                return $this->redirector->to(implode('/', $segments));
            }
            $this->app->setLocale($locale);
            $request->segment = implode('/', $segments);
        }
        return $next($request);
    }

}
