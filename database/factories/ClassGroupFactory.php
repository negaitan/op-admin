<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Models\ClassGroup;
use App\Models\Image;

$factory->define(ClassGroup::class, function (Generator $faker) {
    return [
        'name' => $faker->word,
        'logo_image_id' => factory(Image::class)->create()->id, // $faker->imageUrl($width = 640, $height = 480)
        'description' => $faker->word,
        'cover_image_id' => factory(Image::class)->create()->id,
        'video_url' => $faker->url,
        'classes' => $faker->paragraphs($nb = 3, $asText = true),
        'teacher_image_id' => factory(Image::class)->create()->id,
        'teacher_name' => $faker->name,
        'teacher_title' => $faker->title,
        'teacher_text' => $faker->paragraphs($nb = 3, $asText = true),
        'playlist_url' => $faker->url,
    ];
});

$factory->state(ClassGroup::class, 'softDeleted', function () {
    return [
        'deleted_at' => now(),
    ];
});
