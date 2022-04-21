<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
    ->group(function () {
    Route::get('/dashboard', function () {return Inertia::render('Dashboard');})
        ->name('dashboard');
});

Route::get('/', [App\Http\Controllers\ReserveController::class, 'weekly'])->name('weekly');
Route::get('/create', [App\Http\Controllers\ReserveController::class, 'create'])->name('home');
Route::resource('reserve',\App\Http\Controllers\ReserveController::class);
Route::get('/index', [App\Http\Controllers\ReserveController::class, 'index'])->name('index');
