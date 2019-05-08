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
Route::get('post/{slug}', 'HomeController@postDetails')->name('post.details');
Route::get('tag/{slug}', 'HomeController@tagPost')->name('tag.post');
Route::get('category/{id}', 'HomeController@categoryPost')->name('category.post');

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

    //post

    Route::get('/post', 'PostController@index')->name('post.index');
    Route::get('/post/show/{id}', 'PostController@show')->name('admin.post.show');
    Route::get('/post/delete/{id}', 'PostController@delete')->name('admin.post.delete');
    Route::get('/post/active/{id}', 'PostController@postActive')->name('admin.post.active');

    //user
    Route::get('/user', 'AdminUserController@index')->name('admin.user.index');
    Route::get('/user/create', 'AdminUserController@create')->name('admin.user.create');
    Route::post('/user/store', 'AdminUserController@store')->name('admin.user.store');
    Route::get('/user/edit/{id}', 'AdminUserController@edit')->name('admin.user.edit');
    Route::post('/user/update/{id}', 'AdminUserController@update')->name('admin.user.update');
    Route::get('/user/delete/{id}', 'AdminUserController@delete')->name('admin.user.delete');
});


Route::group(['prefix'=>'user'],function (){

    Route::get('/home', 'HomeController@index');
    Route::get('/post', 'UserController@index')->name('user.post');
    Route::get('/create/post', 'UserController@create')->name('user.create.post');
    Route::post('/store/post', 'UserController@store')->name('user.store.post');
    Route::get('/edit/post/{id}', 'UserController@edit')->name('user.edit.post');
    Route::post('/update/post/{id}', 'UserController@update')->name('user.update.post');
    Route::get('/delete/post/{id}', 'UserController@delete')->name('user.delete.post');

    Route::get('/user/profile/view', 'UserController@userProfileView')->name('user.profile.view');
    Route::get('/user/profile/edit/{id}', 'UserController@userProfileEdit')->name('user.profile.edit');
    Route::post('/user/profile/update/{id}', 'UserController@userProfileUpdate')->name('user.profile.update');


});

Route::post('/post/comment', 'UserController@postComment')->name('post.comment');


