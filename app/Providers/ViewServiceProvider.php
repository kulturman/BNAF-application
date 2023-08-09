<?php

namespace App\Providers;
use App\Models\Year;

use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer(['classrooms.fields'], function ($view) {
            $yearItems = Year::pluck('name','id')->toArray();
            $view->with('yearItems', $yearItems);
        });
        View::composer(['classrooms.fields'], function ($view) {
            $yearItems = Year::pluck('name','id')->toArray();
            $view->with('yearItems', $yearItems);
        });
        View::composer(['classrooms.fields'], function ($view) {
            $yearItems = Year::pluck('name','id')->toArray();
            $view->with('yearItems', $yearItems);
        });
        View::composer(['classrooms.fields'], function ($view) {
            $yearItems = Year::pluck('name','id')->toArray();
            $view->with('yearItems', $yearItems);
        });
        View::composer(['classrooms.fields'], function ($view) {
            $yearItems = Year::pluck('name','id')->toArray();
            $view->with('yearItems', $yearItems);
        });
        //
    }
}