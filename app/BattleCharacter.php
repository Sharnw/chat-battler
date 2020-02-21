<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BattleCharacter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'battle_character';

    /**
     * Battle relationship for BattleCharacter
     *
     * @return App\Battle
     **/
    public function battle()
    {
        return $this->belongsTo(Battle::class);
    }

    /**
     * Character relationship for BattleCharacter
     *
     * @return App\Character
     **/
    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
