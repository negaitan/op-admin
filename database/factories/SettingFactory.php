<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Setting;

$factory->define(Setting::class, function (Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->state(Setting::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
