<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->RolesPolicies();
        $this->SettingsPolicies();
        $this->civilPolicies();
        $this->falconPolicies();
        $this->hospitalPolicies();
    }

    public function RolesPolicies()
    {
        // Roles
        Gate::define('create-role', function ($user) {
            return $user->hasAccess('create-role');
        });
        Gate::define('edit-role', function ($user) {
            return $user->hasAccess('edit-role');
        });
        Gate::define('delete-role', function ($user) {
            return $user->hasAccess('delete-role');
        });
        Gate::define('create-user', function ($user) {
            return $user->hasAccess('create-role');
        });
    }
    public function hospitalPolicies()
    {
        // Roles
        Gate::define('create-user-hospital', function ($user) {
            return $user->hasAccess('create-user-hospital');
        });
        Gate::define('Show-user-hospital', function ($user) {
            return $user->hasAccess('Show-user-hospital');
        });
        Gate::define('edit-user-hospital', function ($user) {
            return $user->hasAccess('edit-user-hospital');
        });
        Gate::define('delete-user-hospital', function ($user) {
            return $user->hasAccess('delete-user-hospital');
        });
        Gate::define('all-user-hospital', function ($user) {
            return $user->hasAccess('all-user-hospital');
        });
    }
    public function falconPolicies()
    {
        // Roles
        Gate::define('show-all-falcon', function ($user) {
            return $user->hasAccess('show-all-falcon');
        });
        Gate::define('show-falcon', function ($user) {
            return $user->hasAccess('show-falcon');
        });
        Gate::define('edit-falcon', function ($user) {
            return $user->hasAccess('edit-falcon');
        });

    }
    public function civilPolicies()
    {
        // Roles
        Gate::define('all-civilians', function ($user) {
            return $user->hasAccess('all-civilians');
        });
        Gate::define('edit-civil', function ($user) {
            return $user->hasAccess('edit-civil');
        });
        Gate::define('show-civil', function ($user) {
            return $user->hasAccess('show-civil');
        });
        Gate::define('show-civil-order', function ($user) {
            return $user->hasAccess('show-civil-order');
        });
    }

    public function SettingsPolicies()
    {
        Gate::define('main-settings', function ($user) {
            return $user->hasAccess('main-settings');
        });

        Gate::define('payments', function ($user) {
            return $user->hasAccess('payments');
        });


    }
}
