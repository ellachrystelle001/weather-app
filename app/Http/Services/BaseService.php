<?php
namespace App\Http\Services;

class BaseService {

    public function getQuery ($aData) {
        return [
            'query' => $aData
        ];
    }


}
