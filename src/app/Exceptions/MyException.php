<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class MyException extends Exception
{
    public $error_code;

    /**
     * Exception on invalid Response from WebApi.
     *
     * @param  array  $context
     * @return void
     */
    public function __construct(array $context = [])
    {
        $this->context = $context;
    }

    public function report()
    {
        $message = 'APIからの取得結果が不正です';
        Log::info($message, $this->context);
    }

    public function render()
    {
        $message = 'something is wrong with outer API';
        $bodyArray = [
            'erro_code' => 'E001',
        ];
        return response()->json(
            $bodyArray,
            520
        );
    }
}
