<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasPermissions;

class Role extends Model
{
	use HasPermissions;

    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }
}
