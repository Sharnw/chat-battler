<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'image_id', 'game_id'];
    
    /**
     * Game relationship for character
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
     * BattleCharacter relationship
     *
     * Actual pivot table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    /*
    public function battleCharacters()
    {
        return $this->belongsToMany(BattleCharacter::class);
    }
    */

    /**
     * Battle relationship
     *
     * Uses pivot table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    
    public function battles()
    {
        return $this->belongsToMany(Battle::class, 'battle_character');
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
        return $this->belongsToMany(CharacterItem::class);
    }
    */

    /**
     * Item relationship
     *
     * Uses pivot table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

}
