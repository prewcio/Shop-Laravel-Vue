<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Test
Route::get('test/token', 'App\Http\Controllers\Api\TestingController@index');

//Cart
Route::post('cartCount', 'App\Http\Controllers\Api\CartController@cartCount');
Route::post('getCart', 'App\Http\Controllers\Api\CartController@getCart');

//Items
Route::get('getItems', 'App\Http\Controllers\Api\ItemsController@getItems');

//Categories
Route::get('getCategories','App\Http\Controllers\Api\CategoriesController@getCategories');

//User
Route::post('accountInfo', 'App\Http\Controllers\Api\CustomerController@getUserInfo');
Route::post('checkLogged', 'App\Http\Controllers\Api\CustomerController@checkLogged');
Route::post('loginCheck', 'App\Http\Controllers\Api\CustomerController@checkLogin');
Route::post('registerCheck', 'App\Http\Controllers\Api\CustomerController@registerCheck');
