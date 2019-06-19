<?php
namespace Thiagoprz\HereGeocoder;

use Illuminate\Support\ServiceProvider;

/**
 * Here Geocoder Laravel Service Provider
 * @package Thiagoprz\HereGeocoder
 */
class HereGeocoderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (!in_array(env('APP_ENV'), ['prod', 'production'])) {
            // Testing tool controller
            $this->app->make('Thiagoprz\HereGeocoder\Http\Controllers\HereGeocoderController');
            // Views for the testing tool
            $this->loadViewsFrom(__DIR__.'/views', 'here-geocoder');
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Routes for testing tool
        include __DIR__.'/routes/web.php';
    }

}