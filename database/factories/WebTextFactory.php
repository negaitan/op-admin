<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\WebText;

$factory->define(WebText::class, function (Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->state(WebText::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
