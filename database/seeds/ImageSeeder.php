<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Image::class)->create();
        factory(App\Image::class)->create([
        	'path' => '/img/default-character.png',
        	'file_name' => 'default-character',
        	'file_size' => File::size(public_path('/img/default-character.png')),
        ]);
        factory(App\Image::class)->create([
        	'path' => '/img/default-item.png',
        	'file_name' => 'default-item',
        	'file_size' => File::size(public_path('/img/default-item.png')),
        ]);
    }
}
