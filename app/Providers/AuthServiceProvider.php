<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
        $this->registerPolicies();


        Gate::define('isOrganizer', function (): bool {
            $roles = Auth::user()->roles;
            return $roles->contains('title', 'Organizer');
        });

        Gate::define('isUser', function (): bool {
            $roles = Auth::user()->roles;
            return $roles->contains('title', 'User');
        });

        Gate::define('isAdmin', function (): bool {
            $roles = Auth::user()->roles;
            return $roles->contains('title', 'Admin');
        });

        Gate::define('isOrganizerOrAdmin', function () {
            $roles = Auth::user()->roles;
            return $roles->contains('title', 'Organizer') || $roles->contains('title', 'Admin');
        });
    }
}
