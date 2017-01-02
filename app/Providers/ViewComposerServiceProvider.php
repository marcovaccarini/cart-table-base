<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cart;
use Cookie;
use Illuminate\View\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeCart();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the cart.
     *
     */
    public function composeCart()
    {
        view()->composer('partials.cart', function ($cart_items) {
            $cart_id = cookie('cart_id');
            $cart_items->with('cart_items', Cart::where('cart_id', '=', $cart_id)
                ->with('product')
                ->with('ProductImages')
                ->with('sizenames')
                ->orderBy('updated_at', 'desc')
                ->get());

        });

    }
}
