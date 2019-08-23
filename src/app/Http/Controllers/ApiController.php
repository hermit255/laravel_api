<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * JSON形式のレスポンスを返す
     * @param App\Contracts\Service
     */
    public function __construct()
    {
    }
    public function getJsonResponse($service) : \Illuminate\Http\JsonResponse
    {
        return response()->json(
            $service->getBody(),
            $service->getStatus()
        )->withHeaders($service->getHeaders());
    }
}
