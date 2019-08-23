<?php

namespace App\Services;

abstract class ApiService
{
    /**
     * 共通処理
     * 継承先ServiceはControllerアクションがレスポンス生成に必要なロジックを包括的に引き受ける
     */
    protected $body;
    protected $status = 200;
    protected $headers = [];

    /**
     * @return mixed
     */
    public function getBody () {
        return $this->body;
    }
    /**
     * @return int
     */
    public function getStatus () {
        return $this->status;
    }
    /**
     * @return array
     */
    public function getHeaders () {
        return $this->headers;
    }
}
