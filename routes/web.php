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

Route::get('/', "FrontController@main");
Route::post('/p/find', "FrontController@find");
Route::get('/{id}', 'FrontController@product')->where('id', '[0-9]+');

Auth::routes();
Route::get('/home', 'HomeController@index');


Route::group(["middleware"=>"auth", "prefix"=>"admin"], function(){
    Route::get('/panel', 'HomeController@index');
    Route::get('/shop', 'ShopController@create');
    Route::get('/shop/{id}', 'ShopController@create');
    Route::post('/shop/store', 'ShopController@store');
    Route::post('/shop/store/{id}', 'ShopController@store');
    Route::get('/shop/destroy/{id}', 'ShopController@destroy');
    Route::get('/shops', 'ShopController@all');
    Route::get('/shops/{page}', 'ShopController@all');
    Route::get('/product/{id}', 'ProductController@index');
    Route::get('/product', 'ProductController@index');
    Route::post('/product/store', 'ProductController@store');
    Route::get('/products', 'ProductController@all');
    Route::get('/products/{page}', 'ProductController@all');
    Route::get('/product/destroy/{id}', 'ProductController@destroy');
    Route::post('/shops/json', 'ShopController@jsonList');
});
