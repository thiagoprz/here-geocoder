<?php

namespace Thiagoprz\HereGeocoder;

use GuzzleHttp\Client;

class HereGeocoder
{
    /**
     * @see Geocoder API Documentation: https://developer.here.com/documentation/geocoder/topics/quick-start-geocode.html
     */
    const API_GEOCODER_URL = 'https://geocoder.api.here.com/6.2/geocode.json';

    /**
     * HereGeocoder constructor.
     */
    public function __construct()
    {
        $this->app_id = env('HERE_API_ID');
        $this->app_code = env('HERE_APP_CODE');
    }

    /**
     * Makes a GET request to the API
     *
     * @param string $url
     * @param array $params
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function get($url, $params = null)
    {
        $client = new Client();
        $params['app_id'] = $this->app_id;
        $params['app_code'] = $this->app_code;
        if ($params) {
            $url = $url . '?' . http_build_query($params);
        }
        $data = $client->request('GET', $url);
        return json_decode($data->getBody());
    }

    /**
     * Geocode an address
     * @param $address
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function geocode($address)
    {
        return $this->get(self::API_GEOCODER_URL, ['searchtext' => $address]);
    }

    /* @todo Batch geolocation */
    /* @todo Batch places */
}