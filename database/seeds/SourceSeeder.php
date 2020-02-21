<?php

use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DISCORD_WEBHOOK_URL')) {
            factory(App\Source::class)->create([
                'identifier' => 'discord',
                'name' => 'Discord',
                'settings' => json_encode([
                    'webhook_url' => env('DISCORD_WEBHOOK_URL')
                ])
            ]);
        }
    }
}
