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

Route::prefix('admin')->middleware('role:superadministrator|administrator|editor|author|contributor')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::resource('/users','UserController');
    Route::resource('/permissions','PermissionController', ['except' => 'destory']);

    Route::get('/albums', 'AlbumsController@index')->name('albums.index');
    Route::get('/albums/create', 'AlbumsController@create')->name('albums.create');
    Route::get('/albums/{id}', 'AlbumsController@show')->name('albums.show');
    Route::post('/albums/store', 'AlbumsController@store')->name('albums.store');
    Route::delete('/albums/destroy/{id}','AlbumsController@destroy')->name('albums.destroy');

    Route::get('/photos/create/{id}', 'PhotosController@create')->name('photos.create');
    Route::post('/photos/store', 'PhotosController@store')->name('photos.store');
    Route::get('/photos/{id}','PhotosController@show')->name('photos.show');
    Route::delete('/albums/{id}','PhotosController@destroy')->name('photos.destroy');
    Route::put('/photos/{id}','PhotosController@update')->name('photos.update');
});

Route::get('/home', 'HomeController@index')->name('home');