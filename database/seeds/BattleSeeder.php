<?php

use Illuminate\Database\Seeder;

class BattleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Battle::class, 5)->create()->each(function ($battle) {
        	foreach ($battle->game->characters()->take(rand(1, 4))->get() as $character) {
        		$battle->characters()->attach($character->id);
        	}
            if (rand(1, 2) == 2) {
                $battle->update(['winning_character_id' => $battle->characters()->first()->id]);
            }
    	});
    }
}
