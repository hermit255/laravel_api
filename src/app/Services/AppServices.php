<?php

namespace App\Services;

abstract class AppService
{
    /**
     * 共通処理
     */
    protected $body;
    protected $status = 200;
    protected $headers = [];

    /**
     * @return Illuminate\Http\Response
     */
    public function getResponse()
    {
        return response(
            $this->body,
            $this->status
        )->withHeaders($this->headers);
    }
}
