<?php

namespace App\Services\ChatSources;

use Illuminate\Support\Collection;
use App\Services\ChatSources\ChatSource;

class ChatSourcesManager
{
    /**
     * Chat Sources collection.
     * @var \Illuminate\Support\Collection
     */
    public $collection;

    public function __construct()
    {
        $this->collection = Collection::make([]);
    }

    /**
     * Get all ChatSources Collection.
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection
    {
        return $this->collection;
    }

    /**
     * Put ChatSource class to ChatSources Collection.
     * @return void
     */
    public function put(ChatSource $source)
    {
        $this->collection->put($source->identifier(), $source);
    }

    /**
     * Get ChatSource class from ChatSources Collection.
     * @return void
     */
    public function get($identifier)
    {
        return $this->collection->get($identifier);
    }

    /**
     * Get an array of ChatSources.
     * @return array
     */
    public function toArray(): array
    {
        return $this->all()->map(function($source) {
            return [
                'identifier' => $source->identifier(),
                'label' => $source->label(),
                'settings' => $source->defaultSettings()
            ];
        })->toArray();
    }
}