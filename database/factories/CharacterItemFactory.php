<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CharacterItems;
use Faker\Generator as Faker;

$factory->define(CharacterItems::class, function (Faker $faker) {
    return [
        'item_id' => App\Item::first()->id,
        'character_id' => App\Character::first()->id,
    ];
});
