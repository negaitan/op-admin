<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Image;

$factory->define(Image::class, function (Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->state(Image::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
