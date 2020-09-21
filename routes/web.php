<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', function () {
        return view('admin.login.login');
    });
});
Route::group(['namespace' => 'Users'], function () {

    Route::get('/shopping-cart', 'CartController@show')->name('cart.show');

    Route::resource('products', 'ProductController');

    Route::get('/shop', 'ProductController@indexShop')->name('shop.index');

    Route::get('orders/order_history', 'OrderController@index')->name('orders.index');

    Route::get('orders/store', 'OrderController@store')->name('orders.store');

    Route::resource('orders', 'OrderController')->only('show');

    Route::resource('orders', 'OrderController')->only('show');

    Route::get('/home', 'ProductController@index')->name('home');

    Route::get('/addToCart/{product}', 'CartController@create')->name('cart.add');

    Route::put('/products/{product}', 'CartController@update')->name('cart.update');

    Route::delete('/products/{product}', 'CartController@destroy')->name('product.remove');

    Route::get('/', 'ProductController@index', function () {
        return view('users.products.index');
    });

    Route::get('/addToCart/{product}', 'CartController@create')->name('cart.add');

    Route::delete('/products/{product}', 'CartController@destroy')->name('product.remove');
});


Route::get('language/{language}', 'LanguageController@index')->name('language.index');

Route::group(['namespace' => 'Admin', 'middleware' => 'verified', 'middleware' => 'administrator'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('categories', 'CategoryController')->except([
            'show'
        ]);

        Route::resource('products', 'ProductController')->except([
            'show'
        ]);

        Route::resource('users', 'UserController');

        Route::resource('orders', 'OrderController')->except('store');

    });
});

Route::group(['namespace' => 'Admin', 'middleware' => 'verified', 'middleware' => 'administrator'], function () {
    Route::group(['prefix' => 'api'], function () {
        Route::patch('/changeStatus', 'OrderController@changeStatus')->name('change.status');
    });
});
