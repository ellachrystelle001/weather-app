<?php
namespace App\Http\Services\Weather;

use App\Constants\OpenWeatherEndpoints;
use App\Http\Services\BaseService;
use App\Libraries\GuzzleLibrary;

/**
 * Class GeoCodingService
 * @package App\Http\Services
 * @author Chrystelle Ella Llaguno
 */
class GeoCodingService extends BaseService 
{

    /**
     * API geo code action
     * @param $sLocation
     * @return object
     */
    public function getGeoCode($sLocation) {
        $aQuery = $this->getQuery([
            'q'     => $sLocation,
            'limit' => 5,
            'appid' => env('OPENWEATHER_APP_ID')
        ]);
        $sUrl = OpenWeatherEndpoints::BASE_URI . OpenWeatherEndpoints::GEOCODING_API_ENDPOINT;

        return GuzzleLibrary::guzzleRequest('GET', $sUrl, $aQuery);
    }
}
