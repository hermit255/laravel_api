<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CalendarController extends ApiController
{
    /**
     * 指定年月のカレンダーに対応した日付オブジェクト配列を返す
     */
    public function index(
        \App\Contracts\GetCalendarInterface $calendar,
        Request $resquest
    ) : \Illuminate\Http\JsonResponse
    {
        // getパラメータで表示年月や表示形式、開始曜日を調整可能
        $body = $calendar(
            $resquest->input('year') ?? date('Y') ,
            $resquest->input('month') ?? date('m'),
            $resquest->input('format') ?? 'Y/m/d',
            $resquest->input('startWeekday') ?? 0
        );
        return $this->getJsonResponse($body);
    }
}
