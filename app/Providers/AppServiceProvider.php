<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Header;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $headers = Header::get();
         view()->share('headers', $headers);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
