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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/shop', 'ShopController@create');
Route::get('/home/shop/{id}', 'ShopController@create');
Route::post('/home/shop/store', 'ShopController@store');
Route::post('/home/shop/store/{id}', 'ShopController@store');
Route::get('/home/shop/destroy/{id}', 'ShopController@destroy');
Route::get('/home/shops', 'ShopController@all');
Route::get('/home/shops/{page}', 'ShopController@all');