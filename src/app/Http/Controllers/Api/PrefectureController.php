<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Prefecture;

class PrefecturesController extends ApiController
{
    /**
     * 都道府県データ全件をJsonで返す
     * @return Illuminate\Http\Response
     */
    public function list(
        \App\Contracts\GetPrefecturesIntaface $prefectureList,
        Prefecture $dbPrefecture
    ) : \Illuminate\Http\JsonResponse
    {
        // データベースに基づき都道府県リストをjsonで返却する
        try {
            $body = $prefectureList($dbPrefecture);
        } catch (ApiException $e) {
            $body = "{errorCode: E001}";
            $status = 500;
            return $this->getJsonResponse($body, $status);
        }
        return $this->getJsonResponse($body);
    }
}
