<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppController;
use App\Services\PrefectureService;

class PrefecturesController extends AppController
{
    public function __construct(PrefectureService $service)
    {
        $this->service = $service;
    }
    /**
     * 都道府県データ全件をJsonで返す
     * @param App\Services\PrefectureService
     * @return Illuminate\Http\Response
     */
    public function list()
    {
        $this->service->list();
        return response(
            $this->service->getBody(),
            $this->service->getStatus()
        )->withHeaders($this->service->getHeaders());
    }
}
