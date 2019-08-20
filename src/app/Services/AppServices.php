<?php

namespace App\Services;

class AppService
{
    /**
     * 共通処理
     */
    protected $body;
    protected $status = 200;
    protected $headers = [];

    /**
     * @return mixed レスポンスボディ
     */
    public function getBody()
    {
        return $this->body;
    }
    /**
     * @return int レスポンスステータス
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @return array レスポンスヘッダー
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
