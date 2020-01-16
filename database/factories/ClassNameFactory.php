<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\ClassName;

$factory->define(ClassName::class, function (Generator $faker) {
    return [
        'key' => $faker->unique()->word,
        'value' => $faker->word,
        'exposed' => $faker->boolean($chanceOfGettingTrue = 20),
    ];
});

$factory->state(ClassName::class, 'exposed', function () {
    return [
        'exposed' => true,
    ];
});

$factory->state(ClassName::class, 'unexposed', function () {
    return [
        'exposed' => false,
    ];
});

$factory->state(ClassName::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
