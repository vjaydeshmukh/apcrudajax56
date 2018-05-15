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
    return view('layouts.master');
});

Route::prefix('/students')->group(function ()
{
	Route::get('/', 'StudentController@index')->name('index');
	Route::get('/read-data', 'StudentController@readData')->name('readData');
});