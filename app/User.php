<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Passport;
use App\Traits\HasPermissions;
use App\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasPermissions, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    /**
     * Check whether user has the given permission.
     *
     * @param App\Permission $permission
     * @return boolean
     */
    protected function hasPermissionTo($permission) {
       return $this->hasPermissionThroughRole($permission->identifier) || $this->hasPermission($permission->identifier);
    }

    /**
     * Create a personal access token for game management.
     *
     * @return void
     */
    public function createAccessToken() {
        $this->createToken('UserTok');
    }

    /**
     * Attempt to retrieve personal access token for game management.
     *
     * @return string
     */
    public function getAccessToken() {
        $params = ['user_id' => $this->id, 'name' => 'UserTok'];
        $token = Passport::token()->where($params)->first();
        if (!$token) {
            $this->createAccessToken();
            $token = Passport::token()->where($params)->first();
        }

        return $token->id;
    }

}
