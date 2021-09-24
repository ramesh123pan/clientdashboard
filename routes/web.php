<?php

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

    Auth::routes(['register'=>false]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //================== All Admin Related Routes ========================================================
    Route::prefix('admin')->group(function() {
        Route::get('/login',[App\Http\Controllers\Auth\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login.submit');
        Route::group(['middleware' => ['auth:admin']], function() {
            Route::POST('logout/', [App\Http\Controllers\Auth\Admin\LoginController::class,'logout'])->name('admin.logout');                        //==Admin Logout
            Route::get('/', [App\Http\Controllers\Admin\HomeController::class,'home'])->name('admin.dashboard');                                    //==Admin Dashboard
            

            Route::resource('vendors','App\Http\Controllers\Admin\VendorController');  
            Route::resource('roles','App\Http\Controllers\Admin\RoleController'); //==Roles
            Route::resource('all-admins','App\Http\Controllers\Admin\AdminController');  //==All Admin User
        });
    });
