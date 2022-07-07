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


    // Client ID: 96b8b4dc-55ad-4af6-9c1e-230742352713
    // Client secret: gpXvBknPSiyvlafRJ4zDLv8lJjJO0Rz9VZSF4T8F
    // Password grant client created successfully.
    // Client ID: 96b8b4dd-f3dc-43e1-a5ff-80485b41e065
    // Client secret: 0cdBKJ57hp02aQww0GwkFD6M6nswjvR4yr6LlTdO