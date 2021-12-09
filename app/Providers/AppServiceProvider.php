<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // Paginator::defaultView('pagination::default');

        // middleware user
        Blade::if('admin', function () {
            return in_array( auth()->user()->role_id, [ 1 ] );
        }); // in blade use with @admin  ... @endadmin
        Blade::if('uadmin', function () {
            return in_array( auth()->user()->role_id, [ 1,2 ] );
        });
        Blade::if('usector', function () {
            return in_array( auth()->user()->role_id, [ 1,2,3 ] );
        });
        Blade::if('task_force', function () {
            return in_array( auth()->user()->role_id, [ 1,2,4 ] );
        });
    }
}
