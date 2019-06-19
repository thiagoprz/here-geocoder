<?php
/**
 * Package routes
 */
Route::get('here_geocoder', 'Thiagoprz\HereGeocoder\Http\Controllers\HereGeocoderController@index');
Route::post('here_geocoder', 'Thiagoprz\HereGeocoder\Http\Controllers\HereGeocoderController@postAddress');