<?php

namespace App\Services\ChatSources\Providers\Discord;

use Illuminate\Support\ServiceProvider;
use App\Services\ChatSources\Facades\Sources;

class SourceServiceProvider extends ServiceProvider
{
    public function register() 
    {
    }

    public function boot()
    {
        $source = new DiscordSource();
        Sources::put($source);
    }

}
