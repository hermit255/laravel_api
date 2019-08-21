<?php

namespace App\Contracts;

interface Service
{
    // DIが実装先によって異なるのでIFで定義する
    public function run();
    // スーパークラスAppServiceで実装する
    public function getResponse();
}
