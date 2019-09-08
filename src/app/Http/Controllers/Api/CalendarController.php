<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CalendarController extends ApiController
{
    /**
     * 指定年月のカレンダーに対応した日付オブジェクト配列を返す
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(
        \App\Contracts\GetCalendarInterface $calendar,
        Request $resquest
    ) : \Illuminate\Http\JsonResponse
    {
        // データベースに基づき都道府県リストをjsonで返却する
        try {
            $body = $calendar(
                $resquest->input('year') ?? date('Y') ,
                $resquest->input('month') ?? date('m'),
                $resquest->input('format') ?? 'Y/m/d',
                $resquest->input('startWeekday') ?? 0
            );
        } catch (ApiException $e) {
            $body = "{errorCode: E001}";
            $status = 500;
            return $this->getJsonResponse($body, $status);
        }
        return $this->getJsonResponse($body);
    }
}
