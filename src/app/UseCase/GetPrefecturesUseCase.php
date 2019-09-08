<?php

namespace App\UseCase;

use App\Contracts\UseCase;
use App\Exceptions\MyException;

class GetPrefecturesUseCase extends ApiUseCase implements \App\Contracts\GetPrefecturesInterface
{
    /**
     * 処理実行
     * @return array
     * @throws App\Exceptions\MyException
     */
    public function __invoke($dbPrefecture) : Array
    {
        // DBの都道府県データから全件取得する
        $allPrefectures = $this->getAllPrefectures($dbPrefecture);
        if ($this->validatePrefectures($allPrefectures) == false) {
            throw new MyException;
        }
        return $allPrefectures;
    }
    /**
     * 処理実行
     * @param App\Prefecture
     * @return void
     */
    private function getAllPrefectures($dbPrefecture) : Array
    {
        $raw = $dbPrefecture::all(); /* Illuminate\Support\Collection */
        $shapedArray = $raw->toArray();
        return $shapedArray;
    }
    /**
     * 期待されたデータ内容ならtrueを返す
     * @param array $target
     * @return bool
     */
    private function validatePrefectures($allPrefectures) : Bool
    {
        return ( is_array($allPrefectures) && count($allPrefectures) === 47);
    }
}
