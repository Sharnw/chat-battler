<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Source;
use Faker\Generator as Faker;

$factory->define(Source::class, function (Faker $faker) {
    return [
        'name' => 'Discord',
        'identifier' => 'discord',
        'user_id' => App\User::first()->id,
        'settings' => json_encode([])
    ];
});
