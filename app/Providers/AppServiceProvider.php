<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use App\Cart;
use App\Category;
use App\Product;
use App\Size;
use App\ProductImage;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('partials._cartItems', function($view){
            $request = app(\Illuminate\Http\Request::class);
            $cart_id = $request->cookie('cart_id');
            $view->with('latest', \App\Cart::where('cart_id', '=', $cart_id)
                ->with('product')
                ->with('ProductImages')
                ->with('sizenames')
                ->orderBy('updated_at', 'desc')
                ->get());
           // \App\Cart::where('cart_id', '=', '585d5ad0803033.74700789')->with('product')->with('ProductImages')->with('sizenames')->orderBy('updated_at', 'desc')->get()

        });






    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
