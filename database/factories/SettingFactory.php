<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Setting;

$factory->define(Setting::class, function (Generator $faker) {
    return [
        'key' => $faker->unique()->word,
        'value' => $faker->word,
        'exposed' => $faker->boolean,
    ];
});

$factory->state(Setting::class, 'exposed', function () {
    return [
        'exposed' => true,
    ];
});

$factory->state(Setting::class, 'unexposed', function () {
    return [
        'exposed' => false,
    ];
});

$factory->state(Setting::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
