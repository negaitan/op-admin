<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Plan;

$factory->define(Plan::class, function (Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->catchPhrase,
        'price_month' => $faker->randomFloat,
        'price_matriculation' => $faker->randomFloat,
        'price_proportional' => $faker->randomFloat
    ];
});

$factory->state(Plan::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
