<?php

namespace App\Services\ChatSources\Providers\Discord;

use App\Services\ChatSources\ChatSource;
use App\GameSource;

class DiscordSource extends ChatSource
{

    // must be implemented
    public function notifyChat($notification) {
        // send chat command via webhook
    }

    // must be implemented
    public function receiveCommand($command) {

    }

    // must be implemented
    public function identifier() {
        return 'discord';
    }

    // must be implemented
    public function label() {
        return 'Discord Webhook';
    }

    // must be implemented
    public function defaultSettings() {
        return [
            'webhook_url' => null
        ];
    }

    // must be implemented
    // public function settingsIndex() {
    //     return view('settings.index');
    // }

    // must be implemented
    public function featureList() {
        return [
            'chat.commands' => false,
            'chat.notifications' => true
        ];
    }
}
