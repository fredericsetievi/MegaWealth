<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterApiController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\TransactionApiController;

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

Route::prefix('v1')
    ->group(function () {
        Route::post('/register', [RegisterApiController::class, 'authenticateRegister']);
        Route::post('/login', [LoginApiController::class, 'authenticateLogin']);
        Route::middleware('auth:api')->get('/transaction/{email}', [TransactionApiController::class, 'show']);
    });

    
    // Client ID: 1
    // Client secret: DhCafXLAQ9IZgUBvJ8eo8kScdDvSgTJdB3IDo1Ja
    // Password grant client created successfully.
    // Client ID: 2
    // Client secret: 5vmKK1i2E04sPooN4H4Lq4DbFrpaeRnoMzNpGJYT