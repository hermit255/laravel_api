<?php

namespace App\Mock;

use App\Contracts\UseCase;
use App\Exceptions\MyException;

class GetPrefecturesUseCase implements \App\Contracts\GetPrefecturesIntaface
{
    /**
     * 処理実行
     * @return void
     * @throws App\Exceptions\MyException
     */
    public function __invoke($dbPrefecture)
    {
       // mockery
       $items = [];
       for ($i = 1; $i <= 47; $i++) {
           $item = new \stdClass();
           $item->id = $i;
           $item->name = 'mock'. $i;
           $items[] = $item;
       }
       return \Illuminate\Support\Collection::make($items);
    }
}
