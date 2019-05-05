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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//Admin Login route
Route::get('admin', 'Admin\LoginController@showLoginForm');
Route::post('admin', 'Admin\LoginController@login')->name('admin.login');

Route::group(['prefix'=>'admin'],function (){

    Route::get('/home', 'AdminController@index')->name('admin.home');

});


Route::group(['prefix'=>'user'],function (){

    Route::get('/home', 'HomeController@index')->name('home');

});


