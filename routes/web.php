<?php

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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::middleware('auth')->group(function() {
    Route::resource('inventory_ac', InventoryACController::class);
    Route::resource('kebersihan_outdoor', KebersihanOutdoorController::class);
    Route::get('kebersihan_outdoor/period/{id}', 'KebersihanOutdoorController@iperiod')->name('kebersihan_outdoor.period');
    Route::get('kebersihan_outdoor/create/period/{id}', 'KebersihanOutdoorController@cperiod')->name('kebersihan_outdoor.create.period');
    Route::post('kebersihan_outdoor/store/period', 'KebersihanOutdoorController@speriod')->name('kebersihan_outdoor.store.period');
    
});
