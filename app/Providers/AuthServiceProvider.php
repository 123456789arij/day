<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
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

        Gate::define('entreprise', function ($user) {
            if($user->role_id == 1)
            {
                return true;
            }
            return false;
        });
     // define a admin user role
        Gate::define('superAdmin', function($user) {
            if($user->role_id == 0)
            {
                return true;
            }
            return false;
        });

    }




}
