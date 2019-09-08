<?php

namespace App\Http\Controllers;

use App\Prefecture;
use App\Http\Controllers\Controller;

class PrefecturesController extends Controller
{
    /**
     *
     * @return Illuminate\Support\Facades\View
     */
    public function list()
    {
        // cURLコマンドを使うのが正統派だが、コントローラーとして呼び出すこともできる
        $response = app()->call('App\Http\Controllers\Api\PrefecturesController@list');
        $prefectures = json_decode($response->content());
        return view('prefectures', ['prefectures' => $prefectures]);
    }
}
