<?php
namespace App\Http\Controllers;

use App\Http\Services\Weather\WeatherService;

/**
 * Class WeatherController
 * @package App\Http\Controllers
 * @author Chrystelle Ella Llaguno
 */
class WeatherController extends BaseController 
{

    /**
     * Get weather based on location
     * @param $sLocation
     * @return object
     */
    public function getWeather($sLocation) {

        $oGeoCodeDetails = $this->getGeoLocation($sLocation);

        $iGeoLat = $oGeoCodeDetails['body'][0]['lat'];
        $iGeoLon = $oGeoCodeDetails['body'][0]['lon'];
        
        $oWeatherService = new WeatherService();

        return $oWeatherService->getWeather($iGeoLat, $iGeoLon);
    }
}
