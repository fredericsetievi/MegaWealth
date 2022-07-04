<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterApiController;
use App\Http\Controllers\LoginApiController;

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

Route::prefix('v1')
    ->group(function () {
        Route::post('/register', [RegisterApiController::class, 'authenticateRegister']);
        Route::post('/login', [LoginApiController::class, 'authenticateLogin']);
    });

    
// Client ID: 1
// Client secret: 4cbxPuZF3Q1BAR3It2WYdGobKeoXBYrRbCSm1pCS
// Password grant client created successfully.
// Client ID: 2
// Client secret: lq04vfU8kjWch8Y6Ll3aZhGHsycwAIsU7miARQpj