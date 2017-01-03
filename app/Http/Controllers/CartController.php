<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use App\Size;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Cookie;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //  retrieve the card_id from cookie
        $cart_id = $request->cookie('cart_id');
        $cart_items = Cart::where('cart_id', '=', $cart_id)
            ->with('product')
            ->with('ProductImages')
            ->with('sizenames')
            ->orderBy('updated_at', 'desc')
            ->get();

//dd($cart_items);
        return view('cart.show', compact('cart_items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'qty' => 'required|numeric',
            'sizeId' => 'required|numeric|exists:sizes,id',
            'product_id' => 'required|numeric|exists:products,id',
        ]);

        $product_id = Input::get('product_id');
        $size_id = Input::get('sizeId');
        $qty = Input::get('qty');

        $product = Product::find($product_id);
        $total = $qty*$product->price;

        //  retrieve the card_di from cookie
        $cart_id = $request->cookie('cart_id');

        if($cart_id == null){
            $cart_id = uniqid('',TRUE);
            Cookie::queue(Cookie::make('cart_id', $cart_id, 'forever'));

        }


        $count = Cart::where('product_id', '=', $product_id)->where('size_id', '=', $size_id)->where('cart_id', '=', $cart_id)->count();

        if($count) {

            $item = Cart::where('product_id', '=', $product_id)->where('size_id', '=', $size_id)->where('cart_id', '=', $cart_id)->firstOrFail();

            $itemNow = $item->increment('qty', $qty);

        }
        else{

        // user_id is really necessary here?
        Cart::create([
            'cart_id' => $cart_id,
            'product_id' => $product_id,
            'size_id' => $size_id,
            'qty' => $qty,
        ]);
        }
        $cart_items = Cart::where('cart_id', '=', $cart_id)
            ->with('product')
            ->with('ProductImages')
            ->with('sizenames')
            ->orderBy('updated_at', 'desc')
            ->get();


//  TODO try this ->get(array('id', 'desc', 'authorID'));
        $total=0;

        //dd($cart_items);






        return $cart_items;

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //  retrieve the card_id from cookie
        $cart_id = $request->cookie('cart_id');

        $item = Cart::where('id', '=', $id)->where('cart_id', '=', $cart_id)->firstOrFail();

        if (Input::get('id') && (Input::get('increment')) == 1) {

            $item->qty = $item->qty + 1;

        }

        //decrease the quantity
        if (Input::get('id') && (Input::get('decrement')) == 1) {

            $item->qty = $item->qty - 1;

        }

        $item->save();

        //return $item->toJson();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cart_id = $request->cookie('cart_id');
        $item = Cart::where('id', '=', $id)->where('cart_id', '=', $cart_id)->firstOrFail();

        $item->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');


        return redirect()->action('CartController@index');
    }
}
