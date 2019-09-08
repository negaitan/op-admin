<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Plan;

$factory->define(Plan::class, function (Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->state(Plan::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
