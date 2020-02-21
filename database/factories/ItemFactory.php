<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
    	'name' => $faker->word,
    	'image_id' => App\Image::where('file_name', 'default-item')->first()->id
    ];
});
