<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppController;

class PrefecturesController extends AppController
{
    /**
     * 都道府県データ全件をJsonで返す
     * @return Illuminate\Http\Response text/json
     */
    public function list()
    {
        /*
         * 開発方針
         *   1. コントローラーメソッド:1サービスクラスの対応関係でビジネスロジックを処理させる
         *   2. make()に与えるクラス名とrun()に与える引数だけでコントローラー間の差異を表現する
         *
         * UIからの入力受け取り+レスポンスを返す窓口となること以外は一切行わない
        */

        // どのサービスを使うか宣言
        $service = app()->make('App\Services\PrefectureListService');
        // run()の実装で必要なDIを行う
        $service->run();
        // レスポンスはserviceに丸投げする
        return $service->getResponse();
    }
}
