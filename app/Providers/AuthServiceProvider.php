<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Student;
use App\Models\Track;
use App\Policies\StudentPolicy;
use App\Policies\TrackPolicy;
use App\Policies\UserPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //

        Student::class => StudentPolicy::class,
        Track::class =>TrackPolicy::class,
        User::class =>UserPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // when user logs in to the system -->
        Gate::define('is-admin', function (User $user) {
            return $user->role === "admin";
        });
        Gate::define('is-manager', function (User $user) {
            return $user->role === "manager";
        });
        Gate::define('is-emp', function (User $user) {
            return $user->role === "emp";
        });



    }
}
