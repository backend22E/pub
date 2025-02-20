<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
    public function boot(): void {

        Gate::define( "admin", function( $user ) {

            return $user->admin == 1;
        });

        Gate::define( "super", function( $user ) {

            return $user->admin == 2;
        });
    }
}
