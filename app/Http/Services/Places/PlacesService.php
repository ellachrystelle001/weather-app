<?php

namespace App\Http\Services\Places;

use App\Constants\FourSquareEndpoints;
use App\Http\Services\BaseService;
use App\Libraries\GuzzleLibrary;

/**
 * Class PlacesService
 * @package App\Http\Services
 * @author Chrystelle Ella Llaguno
 */
class PlacesService extends BaseService
{

    /**
     * API search place action
     * @param $sGeoLocation
     * @return object
     */
    public function searchPlace($sGeoLocation)
    {
        $aQuery = $this->getQuery([
                'll' => $sGeoLocation,
                'categories' => '16000'
        ]);
        $aRequest = array_merge($aQuery, $this->getHeaders());
        $sUrl = FourSquareEndpoints::BASE_URI . FourSquareEndpoints::PLACES_SEARCH_API;

        return GuzzleLibrary::guzzleRequest('GET', $sUrl, $aRequest);
    }

    /**
     * Get API request headers
     * @return array
     */
    public function getHeaders() {
        return [
            'headers' => [
                'Authorization' => env('FOURSQUARE_API_KEY'),
                'accept' => 'application/json'
            ]
        ];
    }

}
