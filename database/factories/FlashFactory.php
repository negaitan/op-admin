<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Flash;

$factory->define(Flash::class, function (Generator $faker) {
    return [
        'zona'=> $faker->word,
        'name_plan'=> $faker->word,
        'precio_flash' => $faker->randomFloat($nbMaxDecimals = 2, $min = 250, $max = 1500),
        'label_flash' => $faker->catchPhrase,
        'precio_especial' => $faker->randomFloat($nbMaxDecimals = 2, $min = 250, $max = 1500),
        'label_especial' => $faker->catchPhrase,
        'precio_onSale' => $faker->randomFloat($nbMaxDecimals = 2, $min = 250, $max = 1500),
        'label_onSale' => $faker->catchPhrase,
        'precio_regular' => $faker->randomFloat($nbMaxDecimals = 2, $min = 250, $max = 1500),
        'label_regular' => $faker->catchPhrase
    ];
});

$factory->state(Flash::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
