<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // FIX SQLSTATE[42000] en migration

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191); // FIX SQLSTATE[42000] en migration

        // LOCALE
        \Config::set('app.locale', env('LOCALE', 'es'));
        $locale = \Config::get('app.locale');
        app()->setLocale($locale);
        setlocale(LC_TIME, $locale);
        \Carbon\Carbon::setLocale($locale);
        // https://github.com/rappasoft/laravel-5-boilerplate/issues/211

        // TIMEZONE
        \Config::set('app.timezone', env('TIMEZONE', 'America/Argentina/Buenos_Aires'));
        $timezone = \Config::get('app.timezone');
        date_default_timezone_set($timezone);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
