<?php
namespace App\Http\Services\Weather;

use App\Constants\OpenWeatherEndpoints;
use App\Http\Services\BaseService;
use App\Libraries\GuzzleLibrary;

/**
 * Class WeatherService
 * @package App\Http\Services
 * @author Chrystelle Ella Llaguno
 */
class WeatherService extends BaseService 
{

    /**
     * API get weather details action
     * @param $iGeoLat
     * @param $iGeoLon
     * @return object
     */
    public function getWeather($iGeoLat, $iGeoLon) {
        $aQuery = $this->getQuery([
            'lat'   => $iGeoLat,
            'lon'  => $iGeoLon,
            'appid' => env('OPENWEATHER_APP_ID')
        ]);
        $sUrl = OpenWeatherEndpoints::BASE_URI . OpenWeatherEndpoints::WEATHER_API_ENDPOINT;

        return GuzzleLibrary::guzzleRequest('GET', $sUrl, $aQuery);
    }
}
