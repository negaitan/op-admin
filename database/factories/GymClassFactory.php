<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\GymClass;

$factory->define(GymClass::class, function (Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->state(GymClass::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
