<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        $user = \Auth::user();
        $role = $user?->roles()->first();

        \View::share("user", $user);
        \View::share("role", $role);

        \View::composer(["components.dashboard.header"], function ($view) {
            $user = \Auth::user();
            $role = $user?->roles()->first();

            $view->with("user", $user);
            $view->with("role", $role);
        });
    }
}
