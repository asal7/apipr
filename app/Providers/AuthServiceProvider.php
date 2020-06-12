<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Products' => 'App\Policies\ProductPolicy',
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        foreach ($this->getPermissions() as $permission) {
            Gate::define($permission->name, function ($user) use($permission){
                return $user->hasRole($permission->roles);
                // return Response()->json($user->hasRole($permission->roles));
            });
        }
    }

    public function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
