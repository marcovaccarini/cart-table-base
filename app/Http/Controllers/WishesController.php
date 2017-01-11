<?php

namespace App\Http\Controllers;

use App\Wish;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Illuminate\Support\Facades\Input;
use Cookie;

class WishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart_id = $request->cookie('cart_id');
        $wishes = Wish::where('cart_id', '=', $cart_id)
            ->with('product')
            ->with('ProductImages')
            ->orderBy('updated_at', 'desc')
            ->get();
//dd($wishes);
        return view('wishlist.show', compact('wishes'));
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
            'product_id' => 'required|numeric|exists:products,id',
        ]);

        $product_id = Input::get('product_id');

        //  retrieve the card_id from cookie
        $cart_id = $request->cookie('cart_id');

        if($cart_id == null){
            $cart_id = uniqid('',TRUE);
            Cookie::queue(Cookie::make('cart_id', $cart_id, 'forever'));
        }


        $count = Wish::where('product_id', '=', $product_id)->where('cart_id', '=', $cart_id)->count();

        if($count) {
            // article already in wishlist
            return response()->json(['success' => true], 200);
        }
        else{

            Wish::create([
                'cart_id' => $cart_id,
                'product_id' => $product_id,
            ]);

            //  TODO: return also the total number of wish
            $total_wishes = Wish::where('cart_id', '=', $cart_id)->count();
            return response()->json(['success' => true, 'total_wishes' => $total_wishes], 201);
        }
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
    public function edit($id)
    {
        //
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
        //
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
        $item = Wish::where('id', '=', $id)->where('cart_id', '=', $cart_id)->firstOrFail();

        $item->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the cart item!');


        return redirect()->action('WishesController@index');
    }
}
