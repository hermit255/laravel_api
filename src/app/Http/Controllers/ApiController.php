<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function __construct()
    {
    }

    /**
     * JSON形式のレスポンスを返す
     * @param array | object, integer, array, integer
     */
    public function getJsonResponse(
        $body,
        $status = 200,
        $headers = array(),
        $option = JSON_UNESCAPED_UNICODE
    ) : \Illuminate\Http\JsonResponse
    {
        return response()->json(
            $body,
            $status,
            $headers,
            $option
        );
    }
}
