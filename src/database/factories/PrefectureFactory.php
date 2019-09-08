<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prefecture;
use Faker\Generator as Faker;

$factory->define(Prefecture::class, function () {
    $faker = Faker\Factory::create('ja_JP');
        return [
            'name' => $faker->name,
            'surfix' => '県',
        ];
    },
    'dummy'
);
