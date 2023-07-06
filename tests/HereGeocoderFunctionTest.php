<?php

namespace Thiagoprz\HereGeocoder\Test;

use Thiagoprz\HereGeocoder\HereGeocoder;

class HereGeocoderFunctionTest extends TestCase
{
    public function testGeocodeReturnIsValid()
    {
        $address_data = $this->hereGeocoder->geocode('Champ de Mars, 5 Avenue Anatole France, 75007 Paris');
        $this->assertJsonFileContainsJsonString( __DIR__ . '/here-geocoder-schema.json', $address_data);
    }
}
