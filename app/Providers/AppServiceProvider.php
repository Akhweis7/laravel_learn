<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Events\UserRegistered;
use App\Listeners\SendWelcomeEmailListener;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {

        Gate::define('delete-product', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('create-product', function (User $user) {
            return $user->is_admin === 1;
        });

        Gate::define('update-product', function (User $user) {
            return $user->is_admin === 1;
        });
    }
}