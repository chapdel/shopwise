<?php

namespace App\Providers;

use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('partials.header', function ($view) {
            $view->with('cartCount', CartFacade::getContent()->count());
        });
    }
}
