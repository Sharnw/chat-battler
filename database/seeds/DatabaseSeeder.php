<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(SourceSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(BattleSeeder::class);
    }
}
