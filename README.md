**HERE GEOCODER**
=

A Laravel package to work with Here Maps API.

**Installing**
-------------
`composer require thiagoprz/here-geocoder`

- Add provider on config/app.php 
```
'providers' => [
    ...
    Thiagoprz\HereGeocoder\HereGeocoderServiceProvider::class,
    ...
]
```

- Add two enviromental variables on your projects .env file (or on your system variables):
*HERE_API_ID* and *HERE_APP_CODE*. 

They are yout APP ID and APP (*secret*)CODE. You just need to register on https://developer.here.com/?create=Freemium-Basic&keepState=true&step=account to receive you them.



**Features**
-------------
- Address (and places) Geocode

```
$geocoder = new HereGeocoder();
$geocoder->geocode('Champ de Mars, 5 Avenue Anatole France, 75007 Paris'); 
// Returns
{"Response":{"MetaInfo":{"Timestamp":"2019-06-19T11:58:23.882+0000"},"View":[{"_type":"SearchResultsViewType","ViewId":0,"Result":[{"Relevance":0.72,"MatchLevel":"street","MatchQuality":{"Country":1,"City":1,"Street":[1],"PostalCode":1},"Location":{"LocationId":"NT_FuYSIyQ21HcHCtmZuSx09B","LocationType":"point","DisplayPosition":{"Latitude":48.85478,"Longitude":2.30038},"NavigationPosition":[{"Latitude":48.85478,"Longitude":2.30038}],"MapView":{"TopLeft":{"Latitude":48.85798,"Longitude":2.29497},"BottomRight":{"Latitude":48.85317,"Longitude":2.30242}},"Address":{"Label":"Champ-de-Mars, 75007 Paris, France","Country":"FRA","State":"\u00cele-de-France","County":"Paris","City":"Paris","District":"7e Arrondissement","Street":"Champ-de-Mars","PostalCode":"75007","AdditionalData":[{"value":"France","key":"CountryName"},{"value":"\u00cele-de-France","key":"StateName"},{"value":"Paris","key":"CountyName"}]}}}]}]}} 
```
For more information about geocode API check the Here API documentation: https://developer.here.com/documentation/geocoder/topics/what-is.html

**Testing Tool**
--------------
To make it easier Here Geocoder comes with a tool for testing the geocode functionality. After installation access http://YOU_PROJECT_LOCAL_URL/here_geocoder and you will be able to test the geocoding feature without having to code.

The testing tool only will be available when APP_ENV is not running on production (prod or production).

**Roadmap**
-------------
- Unit Tests
- Add batch geolocation support
- Add batch places support
- Add Facade for simpler access to geocode and future methods