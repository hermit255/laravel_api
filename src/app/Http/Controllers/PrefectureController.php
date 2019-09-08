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
        $Controller = app()->make('App\Http\Controllers\Api\PrefecturesController');
        $useCase = app()->make('App\Contracts\GetPrefecturesIntaface');
        $dbPrefectures = app()->make('App\Prefecture');

        $response = $Controller->list($useCase, $dbPrefectures);
        $prefectures = json_decode($response->content());
        return view('prefectures', ['prefectures' => $prefectures]);
    }
}
