<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'source_id'];

    /**
     * Source relationship for games
     *
     * @return App\Source
     **/
    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    /**
     * User relationship for games
     *
     * @return App\User
     **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Character relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    /**
     * Item relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Battle relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function battles()
    {
        return $this->hasMany(Battle::class);
    }
}
