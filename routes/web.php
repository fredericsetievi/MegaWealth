<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('book/create');
});

// Http Methods
// Get all Book
Route::get('/book', [BookController::class, 'index']);
Route::get('/book/create', [BookController::class, 'create']);
// Store Book
Route::post('/book/store', [BookController::class, 'store'])->name('storeBook');
// Update book
Route::put('/book/{id}', [BookController::class, 'update']);
// Delete Book
Route::delete('/book/{id}', [BookController::class, 'destroy']);
