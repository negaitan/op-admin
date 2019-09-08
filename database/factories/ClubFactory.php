<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\Club;
use App\Models\WebText;

$factory->define(Club::class, function (Generator $faker) {
    return [
        'name'         => $faker->company,
        'web_text_id'  => factory(WebText::class)->create()->id,
        'address'      => $faker->address,
        'opening_time' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'latitude'     => $faker->latitude($min = -90, $max = 90),
        'longitude'    => $faker->longitude($min = -180, $max = 180),
    ];
});

$factory->state(Club::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
