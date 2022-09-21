<?php

namespace App\Providers;

use App\Models\College;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Support\ServiceProvider;

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
        view()->composer([

            'admin.departments.index',
            'admin.courses.index',

            'admin.students.create',
            'admin.students.edit'

        ], function($view){
            $view->with('colleges',College::all());//dropdown for create department
            $view->with('departments',Department::all());//dropdown for create course
            $view->with('courses',Course::all());//dropdown for create student
        });
        
    }
}
