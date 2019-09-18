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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pizzas', 'PizzaController@index');

Route::get('/users/{email}', 'UserController@show');
Route::post('/users', 'UserController@store');
Route::patch('/users/{id}', 'UserController@update');

Route::get('/orders/{id}', 'OrderController@show');
Route::post('/orders', 'OrderController@store');
Route::post('/payment-success', 'OrderController@payment_success');
