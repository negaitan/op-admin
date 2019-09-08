<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\ClassGroup;

$factory->define(ClassGroup::class, function (Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->state(ClassGroup::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
