<?php

use App\Http\Controllers\Auth\Admin\AdminHomeController;
use App\Http\Controllers\Auth\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Auth\Admin\AdminRegisterController;
use App\Http\Controllers\Auth\Admin\GamesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');   



// Admin
Route::get('admin/register', [AdminRegisterController::class,'showRegistrationForm']);
Route::post('admin/register', [AdminRegisterController::class,'register'])->name('admin.register');
Route::get('admin/login', [AdminLoginController::class,'showLoginForm'])->name('auth.admin.showLoginForm');
Route::post('admin/login', [AdminLoginController::class,'login'])->name('auth.admin.login');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('home', [AdminHomeController::class, 'index'])->name('admin.home');
    
    Route::resource('games', GamesController::class);

    Route::resource('roles', RolesController::class);
});

