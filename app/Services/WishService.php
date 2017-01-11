<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Wish;
use Illuminate\Http\Request;

class WishService extends Model
{
    public function get_total_wish()
    {
        $request = app(\Illuminate\Http\Request::class);
        //  retrieve the card_di from cookie
        $cart_id = $request->cookie('cart_id');

        $count_wish = Wish::where('cart_id', '=', $cart_id)->count();

        //$count_wish = $items->sum('qty');

        return $count_wish;
    }

}