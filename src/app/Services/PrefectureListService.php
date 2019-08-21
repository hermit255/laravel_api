<?php

namespace App\Services;

use App\Services\AppService;
use App\Contracts\Service;
use App\Exceptions\MyException;

class PrefectureListService extends AppService implements Service
{
    /**
     * 処理実行
     * @return void
     */
    public function run()
    {
        // DBの都道府県データから全件取得する
        $prefectureModel = app()->make('Prefecture');
        $allPrefectures = $this->getAllPrefectures($prefectureModel);

        // 取得結果に応じたレスポンスを作成する(依存する項目を注入すること)
        $this->body = $this->getBody($allPrefectures);
        $this->status = $this->getStatus($allPrefectures);
        $this->headers = $this->getHeaders();
    }
    /**
     * $this->bodyの生成基準を明示する
     * @return mixed レスポンスボディ
     */
    private function getBody($allPrefectures)
    {
        return $allPrefectures;
    }
    /**
     * $this->statusの生成基準を明示する
     * @return int レスポンスステータス
     */
    private function getStatus($allPrefectures)
    {
        if ( $this->prefecturesValidation($allPrefectures) ) {
            return 200;
        } else {
            // 取得した都道府県が基準に合わなければ204を返す
            return 204;

        }
    }
    /**
     * $this->headersの生成基準を明示する
     * @return array レスポンスヘッダー
     */
    private function getHeaders()
    {
        return [];
    }
    /**
     * 処理実行
     * @param App\Prefecture
     * @return void
     */
    public function getAllPrefectures($prefectureModel)
    {
        $raw = $prefectureModel::all(); /* Illuminate\Support\Collection */
        $shapedArray = $raw->toArray();
        return $shapedArray;
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
