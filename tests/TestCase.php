<?php

namespace Thiagoprz\HereGeocoder\Test;

use Thiagoprz\HereGeocoder\HereGeocoderServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;


class TestCase extends OrchestraTestCase
{

    /**
     * Load package service provider
     * @param \Illuminate\Foundation\Application $app
     * @return Thiagoprz\HereGeocoder\HereGeocoderServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [HereGeocoderServiceProvider::class];
    }

}