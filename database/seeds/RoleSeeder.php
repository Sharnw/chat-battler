<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = factory(App\Role::class)->create([
    		'identifier' => 'Admin',
            'name' => 'Administrator'
    	]);

        $adminRole->givePermission('manage-users');

        $playerRole = factory(App\Role::class)->create([
            'identifier' => 'player',
            'name' => 'Player'
        ]);

        $playerRole->givePermission('manage-games');
    }
}
