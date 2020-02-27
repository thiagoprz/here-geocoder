<?php

namespace Thiagoprz\HereGeocoder\Test;


use Thiagoprz\HereGeocoder\HereGeocoder;
use EnricoStahn\JsonAssert\Assert as JsonAssert;

class HereGeocoderFunctionTest extends TestCase
{

    use JsonAssert;

    protected $hereGeocoder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->hereGeocoder = new HereGeocoder();
    }

    public function testGeocodeReturnIsValid()
    {
        $address_data = $this->hereGeocoder->geocode('Champ de Mars, 5 Avenue Anatole France, 75007 Paris');
        $this->assertJsonMatchesSchema($address_data, __DIR__ . '/here-geocoder-schema.json');
    }
}