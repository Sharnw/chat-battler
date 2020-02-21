<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BattleCharacter;
use Faker\Generator as Faker;

$factory->define(BattleCharacter::class, function (Faker $faker) {
    return [
        'battle_id' => App\Battle::first()->id,
        'character_id' => App\Character::first()->id,
    ];
});
