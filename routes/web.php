<?php

use Illuminate\Support\Facades\Route;

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
    return view('main');
});

Route::get('/products', function() {
    return view('items');
});

Route::get('/category', function() {
    return view('categories');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/statute', function() {
    return view('statute');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/cart', function() {
    return view('cart');
});

Route::get('/account', function() {
    return view('account');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/register', function() {
    return view('register');
});

Route::get('/logout',"App\\Http\\Controllers\\Api\\CustomerController@logout");
