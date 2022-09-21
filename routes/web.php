<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\VisitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard',[HomeController::class,'index'])->name('admin.dashboard');


//routing for apartments
Route::resource('apartments',ApartmentController::class)->names([
    
    'index'=>'admin.apartments.index',
    'show'=>'admin.apartments.show',
    'create'=>'admin.apartments.create',
    'store'=>'admin.apartments.store',
    'edit'=>'admin.apartments.edit',
    'update'=>'admin.apartments.update',
    'destroy'=>'admin.apartments.delete',

]);


//routing for visitors
Route::resource('visitors',VisitorController::class)->names([
    
    'index'=>'admin.visitors.index',
    'show'=>'admin.visitors.show',
    'create'=>'admin.visitors.create',
    'store'=>'admin.visitors.store',
    'edit'=>'admin.visitors.edit',
    'update'=>'admin.visitors.update',
    'destroy'=>'admin.visitors.delete',

]);

Route::get('/admin/visitors/checkout',[VisitorController::class,'checkoutList'])->name('admin.visitors.checkoutList');
Route::get('/admin/visitors/search',[VisitorController::class,'search'])->name('admin.visitors.visitorSearch');


//routing for college
Route::resource('colleges',CollegeController::class)->names([
    
    'index'=>'admin.colleges.index',
    'show'=>'admin.colleges.show',
    'create'=>'admin.colleges.create',
    'store'=>'admin.colleges.store',
    'edit'=>'admin.colleges.edit',
    'update'=>'admin.colleges.update',
    'destroy'=>'admin.colleges.delete',

]);





//routing for student
Route::resource('students',StudentController::class)->names([
    
    'index'=>'admin.students.index',
    'show'=>'admin.students.show',
    'create'=>'admin.students.create',
    'store'=>'admin.students.store',
    'edit'=>'admin.students.edit',
    'update'=>'admin.students.update',
    'destroy'=>'admin.students.delete',

]);