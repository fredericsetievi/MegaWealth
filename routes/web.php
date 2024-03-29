<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\RealEstateController;

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

Route::group(['prefix' => ''], function () {
    Route::get('/', [UserController::class, 'indexHome'])->name('homePage');
    Route::get('/home', [UserController::class, 'indexHome'])->name('homePage');
    Route::get('/aboutUs', [OfficeController::class, 'displayOffice'])->name('aboutUsPage');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::prefix('')
    ->controller(UserController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('/register', 'indexRegister')->name('registerPage');
        Route::post('/register',  'storeRegister')->name('authenticateRegister');
        Route::get('/login', 'indexLogin')->name('loginPage');
        Route::post('/login', 'authenticateLogin')->name('authenticateLogin');
    });


Route::prefix('realEstate')
    ->controller(RealEstateController::class)
    ->group(function () {
        Route::get('/buy', 'buy')->name('buyPage')->middleware('notAdmin');
        Route::get('/rent', 'rent')->name('rentPage')->middleware('notAdmin');
        Route::get('/searchResult', 'searchResult')->name('searchResultPage');
    });

Route::prefix('cart')
    ->controller(CartController::class)
    ->middleware('member')
    ->group(function () {
        Route::get('/', 'index')->name('cartPage');
        Route::post('/', 'store')->name('storeToCart');
        Route::delete('/{realEstateId}', 'destroy')->name('removeFromCart');
        Route::delete('/checkout/{userId}', 'checkout')->name('checkoutCart');
    });

Route::prefix('manageOffice')
    ->controller(OfficeController::class)
    ->middleware('admin')
    ->group(function () {
        Route::get('/', 'index')->name('manageOfficePage');
        Route::get('/create', 'create')->name('createOfficePage');
        Route::post('/', 'store')->name('storeOffice');
        Route::get('/{office}/edit', 'edit')->name('editOfficePage');
        Route::put('/{office}', 'update')->name('updateOffice');
        Route::delete('/{office}', 'destroy')->name('deleteOffice');
    });

Route::prefix('manageRealEstate')
    ->controller(RealEstateController::class)
    ->middleware('admin')
    ->group(function () {
        Route::get('/', 'index')->name('manageRealEstatePage');
        Route::get('/create', 'create')->name('createRealEstatePage');
        Route::post('/', 'store')->name('storeRealEstate');
        Route::get('/{realEstate}/edit', 'edit')->name('editRealEstatePage');
        Route::put('/{realEstate}', 'update')->name('updateRealEstate');
        Route::put('/{realEstate}/finish', 'finish')->name('finishRealEstate');
        Route::delete('/{realEstate}', 'destroy')->name('deleteRealEstate');
    });
