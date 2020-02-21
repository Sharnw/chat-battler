<?php

use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Game::class, 10)->create()->each(function ($game) {
        	foreach (factory(App\Character::class, 5)->make() as $character) {
        		$game->characters()->save($character);	
        	}
        	foreach (factory(App\Item::class, 10)->make() as $item) {
        		$game->items()->save($item);	
        	}
    	});
    }
}
