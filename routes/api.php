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
        Route::middleware('auth:api')->get('/transactions/{email}', [TransactionApiController::class, 'show']);
    });

    // Client ID: 96c657d8-4ab3-444a-b89b-32a848493c1e
    // Client secret: TKCyk4uamIUr1kU2bKAwzRSwuYidfk6dWbQPNDRT
    // Password grant client created successfully.
    // Client ID: 96c657d8-9f75-4740-b707-63c71801a1dc
    // Client secret: qo81mxajug56hWxjmrBMD0Za23H85KOTMpK8Ldeu