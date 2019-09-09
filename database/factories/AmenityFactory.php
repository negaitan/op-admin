<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Amenity;

$factory->define(Amenity::class, function (Generator $faker) {
    return [
        'key' => $faker->unique()->word,
        'value' => $faker->word,
    ];
});

$factory->state(Amenity::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
