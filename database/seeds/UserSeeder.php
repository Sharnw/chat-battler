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
        factory(App\User::class)->create([
    		'name' => 'Test User 1',
    		'email' => 'test@user.com',
    		'password' => Hash::make('test1234')
    	]);
    }
}
