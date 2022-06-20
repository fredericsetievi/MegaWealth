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
//comment
Route::get('/', function () {
    return view('home.index');
})->name('homePage');

Route::prefix('register')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/', 'indexRegister')->name('registerPage');
        Route::post('/authenticateLogin', 'authenticateRegister')->name('authenticateRegister');
    });

Route::prefix('login')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/', 'indexLogin')->name('loginPage');
        Route::post('/authenticateRegister', 'authenticateLogin')->name('authenticateLogin');
    });

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/home', [UserController::class, 'indexHome'])->name('homePage');

Route::get('/aboutUs', [OfficeController::class, 'displayOffice'])->name('aboutUsPage');

Route::get('/buy', [RealEstateController::class, 'buy'])->name('buyPage');

Route::get('/rent', [RealEstateController::class, 'rent'])->name('rentPage');

Route::post('/addToCart/{realEstateId}', [RealEstateController::class, 'addToCart'])->name('addToCart');

Route::post('/removeFromCart/{realEstateId}', [RealEstateController::class, 'removeFromCart'])->name('removeFromCart');

Route::post('/checkoutCart', [RealEstateController::class, 'checkoutCart'])->name('checkoutCart');

Route::get('/cart', [RealEstateController::class, 'cart'])->name('cartPage');

Route::post('/search', [RealEstateController::class, 'search'])->name('search');

Route::get('/searchResult', function () {
    return view('searchResult.index');
})->name('searchResultPage');

Route::prefix('manageCompany')
    ->controller(OfficeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('manageOfficePage');
        Route::get('/create', 'create')->name('createOfficePage');
        Route::post('/store', 'store')->name('storeOffice');
        Route::get('/edit/{id}', 'edit')->name('editOfficePage');
        Route::post('/update/{id}', 'update')->name('updateOffice');
        Route::post('/delete/{id}', 'destroy')->name('deleteOffice');
    });

Route::prefix('realEstate')
    ->controller(RealEstateController::class)
    ->group(function () {
        Route::get('/', 'index')->name('manageRealEstatePage');
        Route::get('/create', 'create')->name('createRealEstatePage');
        Route::post('/store', 'store')->name('storeRealEstate');
        Route::get('/edit/{id}', 'edit')->name('editRealEstatePage');
        Route::post('/update/{id}', 'update')->name('updateRealEstate');
        Route::post('/finish/{id}', 'finish')->name('finishRealEstate');
        Route::post('/delete/{id}', 'destroy')->name('deleteRealEstate');
    });
