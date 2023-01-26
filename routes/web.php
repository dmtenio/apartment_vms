<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;

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

// // redirect index to login
// Route::get('/', function () {
//     return redirect('login');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home  ');

// Route::middleware(['admin'])->prefix('admin')->group(function(){
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
// Route::prefix('admin')->group(function (){
    
    // Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('/visitors/checkout',[VisitorController::class,'checkoutList'])->name('admin.visitors.checkoutList');
    Route::get('/visitors/search',[VisitorController::class,'search'])->name('admin.visitors.visitorSearch');

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


});

//to disable the register route