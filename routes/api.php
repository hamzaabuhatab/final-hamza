<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\RequestUpdateApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserApiController::class, 'login']);
Route::post('/register', [UserApiController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/users', [UserApiController::class, 'index']);
    Route::get('/users/{id}', [UserApiController::class, 'show']);
    Route::post('/users', [UserApiController::class, 'store']);
    Route::put('/users/{id}', [UserApiController::class, 'update']);
    Route::delete('/users/{id}', [UserApiController::class, 'destroy']);

    Route::get('/requests', [RequestUpdateApiController::class, 'index']);
    Route::get('/requests/{id}', [RequestUpdateApiController::class, 'show']);
    Route::post('/requests', [RequestUpdateApiController::class, 'store']);
    Route::put('/requests/{id}', [RequestUpdateApiController::class, 'update']);
    Route::delete('/requests/{id}', [RequestUpdateApiController::class, 'destroy']);

    Route::post('/logout', [UserApiController::class, 'logout']);
});
