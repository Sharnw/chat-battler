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
        factory(App\Source::class)->create([
        	'settings' => json_encode([
                'webhook_url' => 'https://discordapp.com/api/webhooks/680253493537275938/WmgI-AhSAu12z60RLKmIWZ86LKZjLsCfe3DjBafW0wh_ar8FuRlkeHS_QzwoqqE5dnzS
'
            ])
        ]);

    }
}
