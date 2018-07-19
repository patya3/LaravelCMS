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

    Route::get('/albums', 'AlbumsController@index');
    Route::get('albums/create', 'AlbumsController@create');
    Route::post('albums/store', 'AlbumsController@store');
});

Route::get('/home', 'HomeController@index')->name('home');