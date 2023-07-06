<?php

namespace Thiagoprz\HereGeocoder\Test;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Thiagoprz\HereGeocoder\HereGeocoderServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Orchestra\Testbench\Concerns\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $hereGeocoder;

    public function setUp(): void
    {
        parent::setUp();
        $this->hereGeocoder = new HereGeocoder();
    }

    public function getPackageProviders(
        $app
    ): array {
        return [
            HereGeocoderServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {    
        // Implementation code
    }
}
