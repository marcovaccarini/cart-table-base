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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'HomeController@index');

Route::get('/json/product/{id}', 'ProductController@json_show');
//Route::post('cart', 'CartController@store');
Route::resource('cart', 'CartController');

Route::get('products', 'ProductController@index');


Route::pattern('mainCategorySlug', '[a-z\-]+');
Route::pattern('categorySlug', '[a-z\-]+');
Route::pattern('subCategorySlug', '[a-z\-]+');
Route::pattern('productSlug', '[a-z\-]+');

Route::get('/{mainCategorySlug}/{categorySlug}/{subCategorySlug}/{productSlug}', 'ProductController@show');