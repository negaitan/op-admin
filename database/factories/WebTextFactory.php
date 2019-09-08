<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\WebText;

$factory->define(WebText::class, function (Generator $faker) {
    return [
        'key' => $faker->unique()->word,
        'value' => $faker->word,
        'exposed' => $faker->boolean($chanceOfGettingTrue = 20),
    ];
});

$factory->state(WebText::class, 'exposed', function () {
    return [
        'exposed' => true,
    ];
});

$factory->state(WebText::class, 'unexposed', function () {
    return [
        'exposed' => false,
    ];
});

$factory->state(WebText::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
