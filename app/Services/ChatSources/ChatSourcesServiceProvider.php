<?php

namespace App\Services\ChatSources;

use Illuminate\Support\ServiceProvider;

class ChatSourcesServiceProvider extends ServiceProvider
{
    public function register() 
    {
        $this->app->singleton('chat-sources', function ($app) {
            return new ChatSourcesManager();
        });

        if (config('sources.discord')) {
            $this->app->register('\App\Services\ChatSources\Providers\Discord\SourceServiceProvider');   
        }
    }

    public function boot()
    {   
    }

}
