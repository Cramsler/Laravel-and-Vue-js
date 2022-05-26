<?php

use App\Http\Controllers\API\V1\ChatController;
use App\Http\Controllers\API\V1\MessageController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('users', UserController::class);
Route::resource('chats', ChatController::class);
Route::resource('messages', MessageController::class);
