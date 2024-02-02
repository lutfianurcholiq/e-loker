<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrasiController;
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
    return view('layouts.main');
})->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Apply
Route::resource('/apply', ApplyController::class)->middleware('auth');

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate'); 
    Route::post('/logout', 'logout'); 
});

Route::controller(RegistrasiController::class)->group(function () {
    Route::get('/registrasi','index');
    Route::post('/registrasi','store');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index');
    Route::put('/profile/{id}', 'update');
})->middleware('auth');
