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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('recipient', 'RecipientController')->middleware('auth')->only(['index', 'create']);
Route::post('/custom', 'DistrictController@sendCustomMessage');
Route::get('/subscribe', 'RecipientController@subscribe')->name('subscribe')->middleware('guest');
Route::post('/subscribe/store', 'RecipientController@store')->name('subscribe.store');
