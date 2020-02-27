<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Permission;

class PermissionsServiceProvider extends ServiceProvider
{

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
    	// load our permission identifiers into gate definitions
		Permission::get()->map(function($permission){
			Gate::define($permission->identifier, function($user) use ($permission){
		   		return $user->hasPermissionTo($permission);
			});
     	});
    }
}
