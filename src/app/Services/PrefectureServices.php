<?php

namespace App\Services;

use App\Prefecture;
use App\Services\AppService;
use App\Contracts\Service;
use App\Exceptions\MyException;

class PrefectureService extends AppService implements Service
{
    /**
     * 処理実行
     * @return void
     */
    public function list()
    {
        $raw = $this->getPrefectures();
        $shapedArray = [];
        foreach($raw as $prefecture){
            $shapedArray[$prefecture->id] = $prefecture->name;
        }
        $this->body = $shapedArray;
        $this->status = 200;
        $this->headers = [];
    }
    /**
     * 都道府県データを
     * @param App\Prefecture
     * @return void
     */
    private function getPrefectures() {
        // mockery
        $mock_data = [];
        for ($i = 1; $i <= 47; $i++) {
            $temp = new \Illuminate\Support\Collection();
            $temp->id = $i;
            $temp->name = 'mock'. $i;
            $mock_data[] = $temp;
        }
        $prefectures = \Mockery::mock('App\Prefecture');
        $prefectures->shouldReceive('all')->andReturn($mock_data);

        // DB
        // $prefectures = app()->make('App\Prefecture');
        return $prefectures::all(); /* Illuminate\Support\Collection */

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
