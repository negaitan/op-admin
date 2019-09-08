<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Club;

$factory->define(Club::class, function (Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->state(Club::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
