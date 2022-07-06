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


// Client ID: 96b5c9fe-1854-4c3a-96a8-226718eef576
// Client secret: M9k6ktLZFpGWJMlcjeBcFzZJHIbBjAE4orCu96S4
// Password grant client created successfully.
// Client ID: 96b5c9fe-ac38-4f13-82e0-b353d8b803f1
// Client secret: xYJgw4dDCPBG29bXr5ZKV6vl8NnaZpbWHZzh2V7h