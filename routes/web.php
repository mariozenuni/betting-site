<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Auth\Admin\AdminGamesController;
use App\Http\Controllers\Auth\Admin\AdminResultsController;
use App\Http\Controllers\Admin\AdminHomeController;

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

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::resource('games', AdminGamesController::class);
    Route::get('results/{gameId}/create',[AdminResultsController::class,'create'])->name('admin.results.create');
    Route::post('results/store',[AdminResultsController::class,'store'])->name('admin.results.store');
});

