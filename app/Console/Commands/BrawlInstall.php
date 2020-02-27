<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Passport\Passport;
use App\User;
use Artisan;
use Hash;

class BrawlInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'brawl:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the chat brawler application.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        $this->info('Database has been created.');

        Artisan::call('passport:client --personal --name user-client');
        $this->info('Passport client has been generated.');

        Artisan::call('db:seed --class=RoleSeeder');
        Artisan::call('db:seed --class=PermissionSeeder');

        $email = $this->ask('What email should be used for admin login?', 'admin@test.com');
        $pass = $this->ask('What password should be used for admin login?', 'test1234');

        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => $email,
            'password' => Hash::make($pass)
        ]);

        $adminUser->addRole('admin');
        $adminUser->addRole('player');

        if ($this->confirm('Would you like to generate test data?')) {
            Artisan::call('db:seed --class=ImageSeeder');
            Artisan::call('db:seed --class=SourceSeeder');
            Artisan::call('db:seed --class=GameSeeder');
            Artisan::call('db:seed --class=BattleSeeder');
            $this->info('Testing data has been seeded.');
        }

        $this->info('Installation completed.');
    }
}
