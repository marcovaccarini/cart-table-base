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

Route::resource('/checkout', 'CheckoutController');

Route::get('/json/product/{id}', 'ProductController@json_show');

Route::delete('/json/cart/{id}/', 'CartController@json_destroy');
//Route::post('cart', 'CartController@store');
Route::resource('cart', 'CartController');

Route::resource('wishlist', 'WishesController');

Route::get('products', 'ProductController@index');

Route::get('special/{tags}', 'TagsController@index');

Route::pattern('mainCategorySlug', '[a-z0-9_\-]+');
Route::pattern('categorySlug', '[a-z0-9_\-]+');
Route::pattern('subCategorySlug', '[a-z0-9_\-]+');
Route::pattern('productSlug', '[a-z0-9_\-]+');
//'[A-Za-z0-9_\-]+'

Route::get('/{mainCategorySlug}', 'MainCategoryController@show');
Route::get('/{mainCategorySlug}/{categorySlug}', 'CategoryController@show');
Route::get('/{mainCategorySlug}/{categorySlug}/{subCategorySlug}', 'SubCategoryController@show');
Route::get('/{mainCategorySlug}/{categorySlug}/{subCategorySlug}/{productSlug}', 'ProductController@show');

