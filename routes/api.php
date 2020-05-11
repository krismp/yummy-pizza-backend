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

Route::post('register', 'API\RegisterController@register');

Route::post('login', 'API\RegisterController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('products', 'API\ProductController@store');
    Route::put('products/{id}', 'API\ProductController@update');
    Route::patch('products/{id}', 'API\ProductController@update');
    Route::delete('products/{id}', 'API\ProductController@destroy');

    Route::get('carts', 'API\CartController@index');
    Route::get('cart_items', 'API\CartItemController@index');
    Route::get('orders', 'API\OrderController@index');
});

Route::get('products', 'API\ProductController@index');
Route::get('products/{id}', 'API\ProductController@show');

Route::post('carts', 'API\CartController@store');
Route::put('carts/{id}', 'API\CartController@update');
Route::patch('carts/{id}', 'API\CartController@update');
Route::delete('carts/{id}', 'API\CartController@destroy');

Route::post('cart_items', 'API\CartItemController@store');
Route::put('cart_items/{id}', 'API\CartItemController@update');
Route::patch('cart_items/{id}', 'API\CartItemController@update');
Route::delete('cart_items/{id}', 'API\CartItemController@destroy');

Route::post('orders', 'API\OrderController@store');
Route::put('orders/{id}', 'API\OrderController@update');
Route::patch('orders/{id}', 'API\OrderController@update');
Route::delete('orders/{id}', 'API\OrderController@destroy');

