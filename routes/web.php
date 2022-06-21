<?php

use Illuminate\Support\Facades\Route;
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

Route::controller(UserController::class)
    ->group(function () {
        Route::get('/', 'indexLogin')->name('loginPage');
        Route::get('/login', 'indexLogin')->name('loginPage');
        Route::post('/authenticateRegister', 'authenticateLogin')->name('authenticateLogin');
    });

Route::prefix('register')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/', 'indexRegister')->name('registerPage');
        Route::post('/authenticateLogin', 'authenticateRegister')->name('authenticateRegister');
    });

Route::group(['prefix' => ''], function () {
    Route::get('/', [UserController::class, 'indexHome'])->name('homePage');
    Route::get('/home', [UserController::class, 'indexHome'])->name('homePage');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/aboutUs', [OfficeController::class, 'displayOffice'])->name('aboutUsPage');
});

Route::prefix('realEstate')
    ->controller(RealEstateController::class)
    ->group(function () {
        Route::get('/buy', 'buy')->name('buyPage');
        Route::get('/rent', 'rent')->name('rentPage');
        Route::get('/searchResult', 'searchResult')->name('searchResultPage');
        Route::post('/searchProcess', 'searchProcess')->name('searchProcess');
    });

Route::prefix('cart')
    ->controller(RealEstateController::class)
    ->middleware('MemberMiddleware')
    ->group(function () {
        Route::get('/', 'cart')->name('cartPage');
        Route::post('/addToCart/{realEstateId}', 'addToCart')->name('addToCart');
        Route::post('/removeFromCart/{realEstateId}', 'removeFromCart')->name('removeFromCart');
        Route::post('/checkoutCart', 'checkoutCart')->name('checkoutCart');
    });

Route::prefix('manageOffice')
    ->controller(OfficeController::class)
    ->middleware('AdminMiddleware')
    ->group(function () {
        Route::get('/', 'index')->name('manageOfficePage');
        Route::get('/create', 'create')->name('createOfficePage');
        Route::post('/store', 'store')->name('storeOffice');
        Route::get('/edit/{id}', 'edit')->name('editOfficePage');
        Route::post('/update/{id}', 'update')->name('updateOffice');
        Route::post('/delete/{id}', 'destroy')->name('deleteOffice');
    });

Route::prefix('manageRealEstate')
    ->controller(RealEstateController::class)
    ->middleware('AdminMiddleware')
    ->group(function () {
        Route::get('/', 'index')->name('manageRealEstatePage');
        Route::get('/create', 'create')->name('createRealEstatePage');
        Route::post('/store', 'store')->name('storeRealEstate');
        Route::get('/edit/{id}', 'edit')->name('editRealEstatePage');
        Route::post('/update/{id}', 'update')->name('updateRealEstate');
        Route::post('/finish/{id}', 'finish')->name('finishRealEstate');
        Route::post('/delete/{id}', 'destroy')->name('deleteRealEstate');
    });
