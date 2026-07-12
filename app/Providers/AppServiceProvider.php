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
        \View::composer('components.dashboard.header', function (View $view) {
            $user = \Auth::user();
            $view->with([
                'user' => $user,
                'role' => $user?->roles()->first(),
            ]);
        });
    }
}
