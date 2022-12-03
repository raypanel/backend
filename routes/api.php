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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix'     => 'v1',
    'namespace' => 'V1',
    'as'        => 'v1.'
], function () {
    Route::post('auth/register', [\App\Http\Controllers\Api\V1\AuthController::class, 'register'])
        ->name('register');

    Route::post('auth/login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login'])
        ->name('login');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/clients', [\App\Http\Controllers\Api\V1\ClientController::class, 'index'])
            ->name('clients.index');

        Route::post('/clients', [\App\Http\Controllers\Api\V1\ClientController::class, 'store'])
            ->name('clients.store');

        Route::post('/restart-docker', [\App\Http\Controllers\Api\V1\ClientController::class, 'restart'])
            ->name('clients.restart');
    });
});
