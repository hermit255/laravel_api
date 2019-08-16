<?php

namespace App\Http\Controllers\Api;

use App\Prefecture;
use App\Http\Controllers\AppController;

class PrefecturesController extends AppController
{
    /**
     * 都道府県データ全件を返す
     * @param App\Prefecture
     * @return Illuminate\Http\Response
     */
    public function list(Prefecture $prefectures)
    {
        $responseBody = []; /* array */
        $responseStatus = 200; /* integer */
        $responseHeaders = []; /* keyにヘッダ名に持つ連想配列 */

        // 最終的にはサービス層で処理した$responseBodyの代入値だけを受け取る
        $raw = $prefectures::all(); /* Illuminate\Support\Collection */
        $shapedArray = [];
        foreach($raw as $prefecture){
            $shapedArray[$prefecture->id] = $prefecture->name;
        }

        /* レスポンスに関わる処理はコントローラーに残す */
        if ($this->prefecturesValidation($shapedArray)) {
            $responseBody = json_encode($shapedArray);
            $responseHeaders['X-Api-Status'] = '0';
        } else {
            $responseBody = '';
            $responseHeaders['X-Api-Status'] = '1';
            $responseHeaders['X-Api-Error-Code'] = '99';
            $responseStatus = 210;
        }

        return response($responseBody, $responseStatus)
            ->withHeaders($responseHeaders);
    }
    /**
     * 期待されたデータ内容ならtrueを返す
     * @param array $target
     * @return bool
     */
    private function prefecturesValidation($target) {
        return (bool)( is_array($target) && count($target) === 47);
    }
}
