<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = factory(App\User::class)->create([
    		'name' => 'Admin User',
    		'email' => 'admin@user.com',
    		'password' => Hash::make('test1234')
    	]);

        $adminUser->addRole('admin');
        $adminUser->addRole('player');

        $playerUser = factory(App\User::class)->create([
            'name' => 'Test Player',
            'email' => 'player@user.com',
            'password' => Hash::make('test1234')
        ]);

        $playerUser->addRole('player');
    }

}
