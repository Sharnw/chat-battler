<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Battle;
use Faker\Generator as Faker;

$factory->define(Battle::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'game_id' => App\Game::first()->id,
    ];
});
