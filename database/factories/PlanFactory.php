<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Plan;

$factory->define(Plan::class, function (Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->catchPhrase,
        'price_month' => $faker->randomFloat($nbMaxDecimals = 2, $min = 250, $max = 1500),
        'price_matriculation' => $faker->randomFloat($nbMaxDecimals = 2, $min = 250, $max = 1500)
    ];
});

$factory->state(Plan::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
