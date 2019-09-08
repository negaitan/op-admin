<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Image;

$factory->define(Image::class, function (Generator $faker) {
    return [
        'internal_key' => $faker->unique()->word,
        'url' => $faker->imageUrl(400,300),
        'alt' => $faker->catchPhrase,
    ];
});

$factory->state(Image::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
