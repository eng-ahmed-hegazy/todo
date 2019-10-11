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
Auth::routes();
Route::redirect('/','/todos');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/todos','TodoController@index');
Route::get('/add','TodoController@add');
Route::post('/add','TodoController@add');
Route::get('/delete/{id}','TodoController@delete');
Route::get('/edit/{id}','TodoController@edit');
Route::post('/edit/{id}','TodoController@edit');
Route::get('/complete/{id}','TodoController@complete');

