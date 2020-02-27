<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'image_id'];
	
    /**
     * Game relationship for battle
     *
     * @return App\Game
     **/
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Image relationship for character
     *
     * @return App\Image
     **/
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    /**
     * CharacterItem relationship
     *
     * Actual pivot table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    /*
    public function characterItems()
    {
        return $this->belongsToMany(CharacterItem::class, 'character_item');
    }
    */

    /**
     * Character relationship
     *
     * Uses pivot table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characters()
    {
        return $this->belongsToMany(Item::class, 'characters_items');
    }
}
