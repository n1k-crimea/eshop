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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
    'register' => false,
]);

Route::group(
    [
        'middleware' => 'auth',
        'namespace' => 'Admin',
    ],
    function() {
        Route::group(['middleware' => 'is_admin'], function() {
            Route::get('/admin', 'AdminController@index')->name('admin');
            Route::get('/admin/orders', 'OrderController@index')->name('orders.index');
            Route::get('/admin/order/{order}', 'OrderController@show')->name('orders.show');
            Route::resource('/admin/products', 'ProductController');
            Route::resource('/admin/categories', 'CategoryController');
        });

    }
);

Route::get('/', 'MainController@index')->name('index');

Route::post('/cart/add/{id}', 'CartController@cart_add')->name('cart_add');
Route::group(['middleware' => 'cart_empty'], function() {
        Route::get('/cart', 'CartController@cart')->name('cart');
        Route::get('/cart/order', 'CartController@cart_order')->name('cart_order');
        Route::post('/cart/delete/{id}', 'CartController@cart_del')->name('cart_del');
        Route::post('/cart/order', 'CartController@cart_confirm')->name('cart_confirm');
    }
);



Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product}', 'MainController@product')->name('product');




