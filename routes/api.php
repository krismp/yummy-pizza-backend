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
    Route::get('orders', 'API\OrderController@index');
});
Route::post('orders', 'API\OrderController@store');

Route::get('products', 'API\ProductController@index');
Route::get('products/{id}', 'API\ProductController@show');

Route::post('carts', 'API\CartController@store');
Route::get('carts/{id}', 'API\CartController@show');

Route::post('cart_items', 'API\CartItemController@store');
Route::delete('cart_items/{id}', 'API\CartItemController@destroy');

