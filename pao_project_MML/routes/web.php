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

Route::get('/', 'ProductsController@index');

Route::get('/products', 'ProductsController@index');
Route::get('/product_search', 'ProductsController@productSearch');
Route::get('/product/get/{id}', 'ProductsController@product');
Route::get('/product/new', 'ProductsController@newProduct');
Route::get('/product/edit/{id}', 'ProductsController@edit');

Route::post('/add/product', 'ProductsController@add');

Route::patch('/edit/{id}', 'ProductsController@editProduct');
Route::delete('/delete/product/{id}', 'ProductsController@deleteProduct');


Route::get('/aPanel', 'AdminController@index');
Route::get('/users/{id}', 'AdminController@show');

Route::patch('/users/{id}', 'AdminController@update');

Route::delete('/users/{id}', 'AdminController@delete');