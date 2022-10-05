<?php
namespace App\Libraries;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class GuzzleLibrary
 * @package App\Libraries
 * @author Chrystelle Ella Llaguno
 */
class GuzzleLibrary 
{

    public static function guzzleRequest($sRequestType, $sUri, $aRequest) {
        try {
            $oClient = new Client(['verify' => false]);
            $oResponse = $oClient->request($sRequestType, $sUri, $aRequest);

            return [
                'body'   => json_decode($oResponse->getBody()->getContents(), true),
            ];
        } catch (GuzzleException $oException) {
            return [
                'code'    => $oException->getCode(),
                'message' => $oException->getMessage()
            ];
        }
    }
}
