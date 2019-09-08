<?php

namespace App\UseCase;

use App\Contracts\UseCase;
use App\Exceptions\MyException;

class GetCalendarInterface extends ApiUseCase implements GetCalendarInterface
{
    /**
     * 処理実行
     * @return array
     * @throws App\Exceptions\MyException
     */
    public function __invoke()
    {
        // TODO: まだできていない
        return $result;
    }
}
