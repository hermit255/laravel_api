<?php

namespace App\Contracts;

interface GetCalendarInterface
{
    public function __invoke(
        int $year,
        int $month,
        string $format,
        int $startOn
    );
}
