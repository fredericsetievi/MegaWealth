<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\RealEstateController;
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
//coment
Route::get('/', function () {
    return view('login.index');
})->name('loginPage');

Route::prefix('login')
    ->controller(LoginController::class)
    ->group(function () {
        Route::get('/', 'index')->name('loginPage');
        Route::post('/', 'authenticate')->name('authenticateLogin');
    });

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('register.index');
})->name('registerPage');

Route::get('/home', function () {
    return view('home.index');
})->name('homePage');

Route::get('/aboutUs', function () {
    return view('aboutUs.index');
});

Route::get('/buy', function () {
    return view('buy.index');
});

Route::get('/rent', function () {
    return view('rent.index');
});

Route::post('/search', [RealEstateController::class, 'search'])->name('search');

Route::get('/searchResult', function () {
    return view('searchResult.index');
})->name('searchResultPage');

Route::prefix('manageCompany')
    ->controller(OfficeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('manageCompanyPage');
        Route::get('/create', 'create')->name('createOfficePage');
        Route::post('/store', 'store')->name('storeOffice');
        Route::get('/edit/{id}', 'edit')->name('editOfficePage');
        Route::post('/update/{id}', 'update')->name('updateOffice');
        Route::post('/delete/{id}', 'destroy')->name('deleteOffice');
    });

Route::prefix('realEstate')
    ->controller(RealEstateController::class)
    ->group(function () {
        Route::get('/', 'index')->name('realEstatePage');
        Route::get('/create', 'create')->name('createRealEstatePage');
        Route::post('/store', 'store')->name('storeRealEstate');
        Route::get('/edit/{id}', 'edit')->name('editRealEstatePage');
        Route::post('/update/{id}', 'update')->name('updateRealEstate');
        Route::post('/delete/{id}', 'destroy')->name('deleteRealEstate');
    });
