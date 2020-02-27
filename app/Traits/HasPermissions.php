<?php
namespace App\Traits;

use App\Permission;

trait HasPermissions {

   /**
     * Give model permission with the given identifier.
     *
     * @param string $identifier
     * @return void
     */
    public function givePermission($identifier) {
        $permission = Permission::where('identifier', $identifier)->first();
        if ($permission) $this->permissions()->attach($permission->id);
    }

    /**
     * Remove permission with the given identifier from model.
     * 
     * @param string $identifier
     * @return void
     */
    public function revokePermission($identifier) {
        $permission = Permission::where('identifier', $identifier)->first();
        if ($permission) $this->permissions()->detach($permission->id);
    }

    /**
     * Check whether model has been granted permission with given identifier.
     *
     * @param string $identifier
     * @return boolean
     */
  	protected function hasPermission($identifier) {
  	   return (bool) $this->permissions->where('identifier', $identifier)->count();
  	}

}