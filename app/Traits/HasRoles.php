<?php
namespace App\Traits;

use App\Role;

trait HasRoles {

    /**
     * Give model role with the given identifier.
     *
     * @param string $identifier
     * @return void
     */
    public function addRole($identifier) {
        $role = Role::where('identifier', $identifier)->first();
        if ($role) $this->roles()->attach($role->id);
    }

    /**
     * Remove role with the given identifier from model.
     * 
     * @param string $identifier
     * @return void
     */
    public function removeRole($identifier) {
        $role = Role::where('identifier', $identifier)->first();
        if ($role) $this->roles()->detach($role->id);
    }

    /**
     * Check whether model has role with the given identifier.
     * 
     * @param string $identifier
     * @return boolean
     */
    public function hasRole($identifier) {
        return ($this->roles()->where('identifier', $identifier)->count() > 0);
    }

    /**
     * Check whether model has a role which has been granted permission with given identifier.
     *
     * @param string $identifier
     * @return boolean
     */
  	protected function hasPermissionThroughRole($identifier) {
        foreach ($this->roles as $role) {
            if ($role->hasPermission($identifier)) return true;
        }

        return false;
  	}

}