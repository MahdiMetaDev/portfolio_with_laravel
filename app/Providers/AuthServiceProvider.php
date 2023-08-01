<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Blog;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('can', function (User $user, string $name) {
            return $user->hasRole($name) || $user->hasPermission([$name]);
        });
    }
}
