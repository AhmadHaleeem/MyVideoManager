<?php

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

//Route::get('mail', function () {
//
//    return new \App\Mail\ActivateUserAccount();
//});

Route::get('/', 'GuestController@welcome');
Route::get('/activate-account/{token}', 'GuestController@verify')->name('activate-account');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
