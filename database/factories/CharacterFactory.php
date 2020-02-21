<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Character;
use Faker\Generator as Faker;

$factory->define(Character::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image_id' => App\Image::where('file_name', 'default-character')->first()->id
    ];
});