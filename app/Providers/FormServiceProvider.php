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
        View::composer('teacher.course.add','App\Http\Composers\FormComposer');
        View::composer('teacher.course.edit','App\Http\Composers\FormComposer');
        View::composer('teacher.course.table','App\Http\Composers\FormTableComposer');
        View::composer('shingaku.editTerm','App\Http\Composers\AdminTermEditComposer');
        View::composer('shingaku.editTime','App\Http\Composers\AdminTimeEditComposer');
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
