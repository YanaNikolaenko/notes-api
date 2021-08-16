<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/notes', [\App\Http\Controllers\NoteController::class, 'list']);
    Route::post('/notes', [\App\Http\Controllers\NoteController::class, 'store']);
    Route::put('/notes/{note}', [\App\Http\Controllers\NoteController::class, 'update']);

    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout']);
    Route::get('/users/{user}', [\App\Http\Controllers\UserController::class, 'show']);
});
