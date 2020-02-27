<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class)->create([
    		'identifier' => 'manage-users',
            'name' => 'Manage Users'
    	]);

        factory(App\Role::class)->create([
            'identifier' => 'manage-games',
            'name' => 'Manage Games'
        ]);
    }
}
