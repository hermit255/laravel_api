<?php

namespace App\Http\Controllers;

use App\Prefecture;
use App\Http\Controllers\AppController;

class PrefecturesController extends AppController
{
    /**
     *
     * @return Illuminate\Support\Facades\View
     */
    public function list()
    {
        // cURLコマンドを使うのが正統派だが、コントローラーとして呼び出すこともできる
        $wrapperApi = app()->make('App\Http\Controllers\Api\PrefecturesController');
        $response = $wrapperApi->list();
        $prefectures = json_decode($response->content());
        return view('prefectures', ['prefectures' => $prefectures]);
    }
}
