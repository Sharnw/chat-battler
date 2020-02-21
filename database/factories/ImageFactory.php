<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
    	'path' => '/img/default-image.png',
    	'file_name' => 'default-image',
    	'file_size' => File::size(public_path('/img/default-image.png')),
    	'ext' => 'png',
    	'width' => 90,
    	'height' => 90
    ];
});
