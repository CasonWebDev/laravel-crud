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

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::resource('customers', 'CustomersController');
    Route::resource('products', 'ProductsController');
    Route::resource('categories', 'ProductsCategoriesController');
    Route::resource('sells', 'SellsController');
});




Route::redirect('/', '/admin');

Auth::routes();