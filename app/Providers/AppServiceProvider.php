<?php

namespace App\Providers;

use App\SocialLink;
use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // view()->composer(['frontend.components.footer'], function ($view) {
        //     $view->with('socialLinks', SocialLink::all());
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Str::macro('snakeToTitle', function($value) {
            return ucwords(str_replace('_', ' ', $value));
        });
        
        Schema::defaultStringLength(191);
        Passport::routes();

    }
}
