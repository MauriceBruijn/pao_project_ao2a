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
Route::get('/', 'ProductsController@index');


Route::get('/products', 'ProductsController@index');
Route::get('/product/get/{id}', 'ProductsController@product');
Route::get('/product/new', 'ProductsController@newProduct');

Route::post('/add/product', 'ProductsController@add');

Route::delete('/delete/product/{id}', 'ProductsController@deleteProduct');