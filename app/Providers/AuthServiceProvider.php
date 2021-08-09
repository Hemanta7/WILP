<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
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

        Gate::define('isAdmin', function (User $user) {
            return in_array($user->role, ['admin', 'superadmin']);
        });

        Gate::define('isSuperadmin', function (User $user) {
            return $user->role == 'superadmin';
        });

        Gate::define('isActive', function (User $user) {
            return $user->status == 'active';
        });

        Gate::define('canEdit', function (User $user, Post $post) {
            return $user->id == $post->user_id;
        });
    }
}
