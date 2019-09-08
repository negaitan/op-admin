<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\GymClass;
use App\Models\Club;

$factory->define(GymClass::class, function (Generator $faker) {
    return [
        'club_id'   => factory(Club::class)->create()->id,
        'name'      => $faker->word,
        'teacher'   => $faker->word,
        'day_time'  => $faker->randomElement(['0', '1', '2']), // ['manana', 'tarde', 'noche']
        'week_days' => $faker->randomElements(['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']),
        'start_at'  => $faker->time($format = 'H:i:s', $max = 'now'),
        'finish_at' => $faker->time($format = 'H:i:s', $max = 'now'),
        'room'      => $faker->word,
    ];
});

$factory->state(GymClass::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
