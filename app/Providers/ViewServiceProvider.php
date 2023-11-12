<?php

namespace App\Providers;

use App\Models\SiteConfig;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['frontend.header', 'frontend.footer'], function ($view) {
            $view->with('config', SiteConfig::first());
        });
    }
}