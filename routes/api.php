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
        Route::get('/transactions/{email}', [TransactionApiController::class, 'show']); //middleware is handled in controller
    });
