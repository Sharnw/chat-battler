<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
	$source = App\Source::first();
    return [
        'name' => $faker->word,
        'user_id' => App\User::first()->id,
        'source_id' => $source ? $source->id : null
    ];
});
