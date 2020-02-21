<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'character_item';

    /**
     * Character relationship for CharacterItem
     *
     * @return App\Character
     **/
    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    /**
     * Item relationship for CharacterItem
     *
     * @return App\Item
     **/
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
