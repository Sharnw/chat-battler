<?php

namespace App\Services\ChatSources\Facades;

use Illuminate\Support\Facades\Facade;

class Sources extends Facade {
    protected static function getFacadeAccessor() { 
    	return 'chat-sources';
    }
}