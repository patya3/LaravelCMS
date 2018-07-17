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
    Route::get('/', 'AdminController@index');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::resource('/users','UserController');
    Route::resource('/permissions','PermissionController', ['except' => 'destory']);
});

Route::get('/home', 'HomeController@index')->name('home');