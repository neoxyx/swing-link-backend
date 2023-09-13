<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ImagesController as ImagesV1;
use App\Http\Controllers\Api\RequestsController as RequestsV1;
use App\Http\Controllers\Api\ChatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'getUsers']);
    Route::get('/user/{user_id}', [UserController::class, 'getUser']);
    Route::apiResource('images', ImagesV1::class)
        ->only(['index', 'show', 'store', 'destroy']);
    Route::apiResource('requests', RequestsV1::class)
        ->only(['index', 'show', 'store', 'destroy']);
    Route::get('/chat/{user_id}', [ChatController::class, 'getChat']);
    Route::post('/chat/send', [ChatController::class, 'sendMessage']);
});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
