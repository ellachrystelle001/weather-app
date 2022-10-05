<?php
namespace App\Http\Controllers;

use App\Http\Services\Places\PlacesService;

/**
 * Class PlacesController
 * @package App\Http\Controllers
 * @author Chrystelle Ella Llaguno
 */
class PlacesController extends BaseController 
{
     /**
     * Search place action
     * @param $sLocation
     * @return object
     */
    public function searchPlace($sLocation) {

        $oGeoCodeDetails = $this->getGeoLocation($sLocation);

        $iGeoLat = $oGeoCodeDetails['body'][0]['lat'];
        $iGeoLon = $oGeoCodeDetails['body'][0]['lon'];
        $sGeoLocation = $iGeoLat . ',' . $iGeoLon;

        $oPlacesService = new PlacesService();

        return $oPlacesService->searchPlace($sGeoLocation);
    }
}
