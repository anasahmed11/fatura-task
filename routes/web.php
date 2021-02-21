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


Route::get('/', 'Admin\HomeController@index')->name('dashboard');

Auth::routes();
Route::namespace('Admin')->group(function(){
    // home view return all categories
    Route::get('/home', 'HomeController@index')->name('dashboard');
    // return all available products with min price within it's category
    Route::get('category/{id}/products', 'HomeController@category_products')->name('category-available-products');

    /* ------------- categories ---------------*/
    Route::get('/categories', 'CategoryController@index')->name('categories');//categories dashboard index
    Route::get('/categories-select', 'CategoryController@select');//return data to select
    Route::post('categories', 'CategoryController@store');//add
    Route::post('categories/{id}', 'CategoryController@update');//update
    Route::delete('categories/{id}', 'CategoryController@destroy');//delete
    Route::get('/category-products/{id}', 'CategoryController@category_products')->name('category-products');//products of category in dashboard
    /* ------------- products ---------------*/
    Route::get('/products', 'ProductController@index')->name('products');//products dashboard index
    Route::get('/products-select', 'ProductController@select');//return data to select
    Route::post('products', 'ProductController@store');//add
    Route::post('products/{id}', 'ProductController@update');//update
    Route::delete('products/{id}', 'ProductController@destroy');//delete
    Route::get('provider/products/product-available/{id}/{available}', 'ProviderController@change_product_availability');//set - unset available products

    /* ------------- providers ---------------*/
    Route::get('/providers', 'ProviderController@index')->name('providers');//providers dashboard index
    Route::post('providers', 'ProviderController@store');//add
    Route::post('providers/{id}', 'ProviderController@update');//update
    Route::delete('providers/{id}', 'ProviderController@destroy');//delete
    Route::post('providers/product/{id}', 'ProviderController@add_product');//add product with provider price
    Route::get('provider/products/{id}', 'ProviderController@provider_products')->name('provider-products');//products within it's provider

});
