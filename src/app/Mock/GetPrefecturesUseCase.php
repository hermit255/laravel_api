<?php

namespace App\Mock;

use App\Contracts\UseCase;
use App\Exceptions\MyException;

class GetPrefecturesUseCase implements \App\Contracts\GetPrefecturesInterface
{
    /**
     * 処理実行
     * @return void
     * @throws App\Exceptions\MyException
     */
    public function __invoke($dbPrefecture) : Array
    {
       // mockery
       $items = [];
       for ($i = 1; $i <= 47; $i++) {
           $item = new \stdClass();
           $item->id = $i;
           $item->name = 'mock'. $i;
           $items[] = $item;
       }
       $collection = \Illuminate\Support\Collection::make($items);
       return $collection->toArray();
    }
}
