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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-manage', function ($users) {
            return $users->hasAnyRoles(['Admin']);
        });

        Gate::define('access', function ($users) {
            return $users->hasRole(['Admin']);
        });

        Gate::define('student', function ($users) {
            return $users->hasRole(['Student']);
        });

        Gate::define('request', function ($users) {
            return $users->hasRole(['Student']);
        });

        Gate::define('add', function ($users) {
            return $users->hasRole(['Admin']);
        });

        Gate::define('edit', function ($users) {
            return $users->hasRole(['Admin']);
        });

        Gate::define('delete', function ($users) {
            return $users->hasRole(['Admin']);
        });
    }
}
