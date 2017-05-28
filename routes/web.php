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
Route::get('/admin', 'AdminController@index');

//Route::group(['prefix' => 'admin', 'namespace' => 'Controllers\Admin'], function()

Route::group(['middleware'=>'auth'], function () {

    Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'AdminController@allUsers']);
    Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'AdminController@adminSuperadmin']);
    Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'AdminController@superadmin']);

    Route::group(['prefix' => 'admin', 'middleware'=>'check-permission:admin|superadmin'], function(){

        Route::group(['prefix' => 'product'], function () {
            Route::get('featured',['uses'=>'ProductController@featured']);
            Route::post('featured/{id}/edit',['uses'=>'ProductController@editFeatured']);

            Route::get('new',['uses'=>'ProductController@new']);
            Route::post('new/{id}/edit',['uses'=>'ProductController@editNew']);

            Route::get('promotion',['uses'=>'ProductController@promotion']);
            Route::post('promotion/{id}/edit',['uses'=>'ProductController@editPromotion']);
        });

        Route::resource('product', 'ProductController');
        /*Route::get('create',['uses'=>'ProductController@create']);
        Route::post('product',['uses'=>'ProductController@store']);
        Route::get('product/{id}/edit',['uses'=>'ProductController@edit']);
        Route::patch('product/{id}',['uses'=>'ProductController@update']);*/


        Route::get('products',['uses'=>'admin\ProductsController@create']);
        Route::post('products',['uses'=>'admin\ProductsController@store']);


        Route::get('orders',['uses'=>'OrdersController@admin_index']);
        Route::get('orders/{id}',['uses'=>'OrdersController@admin_show']);


        Route::get('categories/home',['uses'=>'CategoryController@admin_home']);
        Route::get('categories',['uses'=>'CategoryController@admin_index']);
        Route::get('categories/create',['uses'=>'CategoryController@admin_create']);


        Route::get('tags/home',['uses'=>'TagsController@admin_home']);
        Route::get('tags',['uses'=>'TagsController@admin_index']);
        Route::get('tags/create',['uses'=>'TagsController@admin_create']);



    Route::get('ajax_cat/{id}',['middleware'=>'check-permission:admin|superadmin','uses'=>'admin\ProductsController@ajax_cat']);
    Route::get('ajax_sub_cat/{id}',['middleware'=>'check-permission:admin|superadmin','uses'=>'admin\ProductsController@ajax_sub_cat']);

    Route::get('upload',['middleware'=>'check-permission:admin|superadmin','uses'=>'admin\ImageController@create']);
    Route::post('upload',['middleware'=>'check-permission:admin|superadmin','uses'=>'admin\ImageController@store']);
    Route::post('product/image/delete/{id}',['middleware'=>'check-permission:admin|superadmin','uses'=>'admin\ImageController@destroy']);
    });
});

//Route::resource('/orders', 'OrdersController');
Route::post('/orders', 'OrdersController@store');
Route::get('/orders', 'OrdersController@index');
Route::get('/orders/{id}', 'OrdersController@show');


Route::resource('/checkout', 'CheckoutController');
/*Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout', 'CheckoutController@store');*/

Route::get('/json/product/{id}', 'ProductController@json_show');

Route::delete('/json/cart/{id}/', 'CartController@json_destroy');
//Route::post('cart', 'CartController@store');
Route::resource('cart', 'CartController');

Route::resource('wishlist', 'WishesController');

Route::get('products', 'ProductController@index');

Route::get('special/{tags}', 'TagsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::pattern('mainCategorySlug', '[a-z0-9_\-]+');
Route::pattern('categorySlug', '[a-z0-9_\-]+');
Route::pattern('subCategorySlug', '[a-z0-9_\-]+');
Route::pattern('productSlug', '[a-z0-9_\-]+');
//'[A-Za-z0-9_\-]+'

Route::get('/{mainCategorySlug}', 'MainCategoryController@show');
Route::get('/{mainCategorySlug}/{categorySlug}', 'CategoryController@show');
Route::get('/{mainCategorySlug}/{categorySlug}/{subCategorySlug}', 'SubCategoryController@show');
Route::get('/{mainCategorySlug}/{categorySlug}/{subCategorySlug}/{productSlug}', 'ProductController@show');