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

Route::middleware('auth:sanctum')
    ->get('/user', [\App\Http\Controllers\Api\UserController::class, 'show']);

Route::prefix('users')->group(function () {
    Route::post('login', \App\Http\Controllers\Api\LoginActionController::class);
});

Route::get('articles', function () {
});

Route::middleware(['auth:sanctum'])
    ->group(function () {
    });


Route::get('article/', function ($id) {
});
