<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'game_id'];
    
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
     * BattleCharacter relationship
     *
     * The actual pivot table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /*
    public function battleCharacters()
    {
        return $this->hasMany(BattleCharacter::class);
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
        return $this->belongsToMany(Character::class, 'battles_characters');
    }

    /**
     * Winning Character relationship for battle
     *
     * @return App\Character
     **/
    public function winningCharacter()
    {
        return $this->belongsTo(Character::class);
    }
}
