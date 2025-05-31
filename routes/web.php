<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->middleware('role:admin');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->except(['show', 'destroy']);
});

Route::resource('requests', App\Http\Controllers\RequestController::class)->middleware('auth');
Route::resource('requests', \App\Http\Controllers\RequestController::class);

