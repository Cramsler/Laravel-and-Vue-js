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

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'authorization'])->name('login');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'registerView'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('{any}', function () {
        return view('index');
    })->where('any','.*');
});

