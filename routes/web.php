<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employeer\EmployeerController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/dologin', [UserController::class, 'dologin'])->name('dologin');

    });

    Route::middleware(['auth:web'])->group(function () {
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    });

});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/dologin', [adminController::class, 'dologin'])->name('dologin');

    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::post('/logout', [AdminController::class,'logout'])->name('logout');

    });

});

Route::prefix('employee')->name('employee.')->group(function () {
    Route::middleware(['guest:employee'])->group(function () {
        Route::view('/login', 'dashboard.employee.login')->name('login');
        Route::post('/dologin', [EmployeerController::class, 'dologin'])->name('dologin');

    });

    Route::middleware(['auth:employee'])->group(function () {
        Route::view('/home', 'dashboard.employee.home')->name('home');
        Route::post('/logout', [EmployeerController::class, 'logout'])->name('logout');

    });

});


