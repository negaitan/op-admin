<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Club;
use Faker\Generator;
use App\Models\Image;
use App\Models\WebText;
use App\Models\Plan;

$factory->define(Club::class, function (Generator $faker) {
    return [
        'name'         => $faker->company,
        'web_text_id'  => factory(WebText::class)->create()->id,
        'address'      => $faker->address,
        'opening_time' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'latitude'     => $faker->latitude($min = -90, $max = 90),
        'longitude'    => $faker->longitude($min = -180, $max = 180),
        'amenities'    => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});

$factory->state(Club::class, 'withPlans', function () {
    return [
        'plans' => factory(Plan::class,2)->create()->pluck('id')->toArray(),
    ];
});

$factory->state(Club::class, 'withImages', function () {
    return [
        'images' => factory(Image::class,2)->create()->pluck('id')->toArray(),
    ];
});

$factory->state(Club::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
