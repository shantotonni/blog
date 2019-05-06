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

//Front Route

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


//Admin Login route
Route::get('admin', 'Admin\LoginController@showLoginForm');
Route::post('admin', 'Admin\LoginController@login')->name('admin.login');

Route::group(['prefix'=>'admin'],function (){

    Route::get('/home', 'AdminController@index')->name('admin.home');

    Route::resource('/category', 'CategoryController');
    Route::get('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');

    Route::resource('/tag', 'TagController');
    Route::get('/tag/delete/{id}', 'TagController@delete')->name('tag.delete');

});


Route::group(['prefix'=>'user'],function (){

    Route::get('/home', 'HomeController@index');
    Route::get('/post', 'UserController@index')->name('user.post');
    Route::get('/create/post', 'UserController@create')->name('user.create.post');
    Route::post('/store/post', 'UserController@store')->name('user.store.post');
    Route::get('/edit/post', 'UserController@edit')->name('user.edit.post');
    Route::get('/update/post', 'UserController@update')->name('user.update.post');
    Route::get('/delete/post', 'UserController@delete')->name('user.delete.post');

});






