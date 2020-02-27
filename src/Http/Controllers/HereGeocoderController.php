<?php

namespace Thiagoprz\HereGeocoder\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Thiagoprz\HereGeocoder\HereGeocoder;

/**
 * HereGeocoderController
 * @package Thiagoprz\HereGeocoder\Http\Controllers
 */
class HereGeocoderController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('here-geocoder::index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postAddress(Request $request)
    {
        if ($request->post('address')) {
            $geocoder = new HereGeocoder();
            return response()->json($geocoder->geocode($request->post('address')));
        }
        abort(401);
    }
}