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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\PagesController@index')->name('home');
Route::get('/shop','App\Http\Controllers\ProductController@index')->name('shop');
Route::get('/shop/{id}','App\Http\Controllers\ProductController@show')->name('product');
Route::get('/cart','App\Http\Controllers\CartController@cart')->name('cart');
Route::get('/add-to-cart/{id}','App\Http\Controllers\CartController@addToCart')->name('add.to.cart');
Route::get('/delete-from-cart/{id}','App\Http\Controllers\CartController@delete')->name('delete.from.cart');