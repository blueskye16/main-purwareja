<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        Gate::define('admin', function(User $user) {
            // return $user->email === 'kevin@gmail.com';
            return $user->is_admin;
        });
    }
}
