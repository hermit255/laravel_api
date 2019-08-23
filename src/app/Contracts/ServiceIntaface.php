<?php

namespace App\Contracts;

interface Service
{
    public function run();
    public function getBody();
    public function getStatus();
    public function getHeaders();
}
