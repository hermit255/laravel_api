<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    /**
     * カレンダーを表示
     */
    public function index() : \Illuminate\View\View
    {
        // cURLコマンドを使うのが正統派だが、コントローラーとして呼び出すこともできる
        $response = app()->call('App\Http\Controllers\Api\CalendarController@index');
        $calendar = json_decode($response->content());
        return view('calendar', ['calendar' => $calendar]);
    }
}
