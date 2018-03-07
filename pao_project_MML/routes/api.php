<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('products', 'ProductsApiController@index');

Route::get('products/id/{id}', 'ProductsApiController@readProduct');
Route::get('products/name/{name}', 'ProductsApiController@readProduct');
Route::get('products/brand/{brand}', 'ProductsApiController@readProduct');
Route::get('products/color/{color}', 'ProductsApiController@readProduct');