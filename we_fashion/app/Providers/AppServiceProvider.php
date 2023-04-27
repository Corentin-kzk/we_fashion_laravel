<?php

namespace App\Providers;

use App\Models\Categorie;
use App\Models\Navbar;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;

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
        Paginator::useBootstrapFive();

        View::composer('*', function($view):void
        {
            $navbars = Categorie::orderBy('id')->get();
            $view->with('navbars', $navbars);
        });
    }
}
