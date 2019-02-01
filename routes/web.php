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
    Route::get('customers', 'CustomersController@index')->name('admin.customers');
    Route::get('products', 'ProductsController@index')->name('admin.products');
    Route::get('categories', 'ProductsCategoriesController@index')->name('admin.productscategories');
});

//Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();