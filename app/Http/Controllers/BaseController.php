<?php
namespace App\Http\Controllers;

use App\Http\Services\Weather\GeoCodingService;

/**
 * Class BaseController
 * @package App\Http\Controllers
 * @author Chrystelle Ella Llaguno
 */
class BaseController
{
    /**
     * Get geo code of the location
     * @param $sLocation
     * @return object
     */
    public function getGeoLocation($sLocation) {
        $oGeoCodingService = new GeoCodingService();

        return $oGeoCodingService->getGeoCode($sLocation);
    }
}
