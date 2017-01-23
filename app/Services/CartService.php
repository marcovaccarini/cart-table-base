<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
use Illuminate\Http\Request;

class CartService extends Model
{
    public function get_total_qty_cart()
    {
        $request = app(\Illuminate\Http\Request::class);
        //  retrieve the card_di from cookie
        $cart_id = $request->cookie('cart_id');

        $items = Cart::where('cart_id', '=', $cart_id)->get();

        $count_items = $items->sum('qty');

        return $count_items;
    }

    public function get_total_cart()
    {
        $request = app(\Illuminate\Http\Request::class);
        $cart_id = $request->cookie('cart_id');
        $cart = Cart::where('cart_id', '=', $cart_id)
            ->with('product')
            ->get();

        $total=0;
        foreach($cart as $item){
            if($item->product->custom_discount != null){
                $total += ($item->product->price - ($item->product->price/100)*$item->product->custom_discount)*$item->qty;
            }
            else{
                $total +=$item->product->price*$item->qty;
            }
        }

        return number_format($total, 2);
    }




}