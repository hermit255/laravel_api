<?php

namespace App\Http\Controllers;

use App\Prefecture;
use App\Http\Controllers\Controller;

class PrefecturesController extends Controller
{
    /**
     * 都道府県表示テスト
     */
    public function list() : \Illuminate\View\View
    {
        // cURLコマンドを使うのが正統派だが、コントローラーとして呼び出すこともできる
        $response = app()->call('App\Http\Controllers\Api\PrefecturesController@list');
        $prefectures = json_decode($response->content());
        return view('prefectures', ['prefectures' => $prefectures]);
    }
}
