<?php

namespace App\Services;

use App\Contracts\Service;
use App\Exceptions\MyException;

class PrefectureListService extends ApiService implements Service
{
    /**
     * 処理実行
     * @return void
     * @throws App\Exceptions\MyException
     */
    public function run()
    {
        // DBの都道府県データから全件取得する
        $prefectureModel = app()->make('Prefecture');
        $allPrefectures = $this->getAllPrefectures($prefectureModel);

        // 取得結果に応じたレスポンスを作成する(依存する項目を注入すること)
        $this->setBody($allPrefectures);
        $this->setStatus($allPrefectures);
        $this->setHeaders();
    }
    /**
     * $this->bodyの依存を明示する
     * @return void
     */
    private function setBody($allPrefectures)
    {
        $this->body = $allPrefectures;
    }
    /**
     * $this->statusの依存を明示する
     * @return void
     */
    private function setStatus($allPrefectures)
    {
        if ( $this->prefecturesValidation($allPrefectures) ) {
            $this->status = 200;
        } else {
            // 取得した都道府県が基準に合わなければ204を返す
            $this->status = 204;

        }
    }
    /**
     * $this->headersの依存を明示する
     * @return int レスポンスステータス
     */
    private function setHeaders()
    {
        $this->headers = [];
    }
    /**
     * 処理実行
     * @param App\Prefecture
     * @return void
     */
    private function getAllPrefectures($prefectureModel)
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
