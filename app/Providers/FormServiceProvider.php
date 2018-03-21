<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('course.add','App\Http\Composers\FormComposer');
        View::composer('course.edit','App\Http\Composers\FormComposer');
        View::composer('course.table','App\Http\Composers\FormTableComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
