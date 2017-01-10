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
use Carbon\Carbon;


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

        //  retrieve the card_id from cookie
        $cart_id = $request->cookie('cart_id');

        if($cart_id == null){
            $cart_id = uniqid('',TRUE);
            Cookie::queue(Cookie::make('cart_id', $cart_id, 'forever'));

        }


        $count = Cart::where('product_id', '=', $product_id)->where('size_id', '=', $size_id)->where('cart_id', '=', $cart_id)->count();

        if($count) {

            $item = Cart::where('product_id', '=', $product_id)->where('size_id', '=', $size_id)->where('cart_id', '=', $cart_id)->firstOrFail();

            $itemNow = $item->increment('qty', $qty);

            return response()->json(['success' => true, 'update_cart_item' => $item->id], 200);

        }
        else{

        // TODO: user_id is really necessary here?
        /*Cart::create([
            'cart_id' => $cart_id,
            'product_id' => $product_id,
            'size_id' => $size_id,
            'qty' => $qty,
        ]);*/
            $last_cart_item = Cart::insertGetId([
                'cart_id' => $cart_id,
                'product_id' => $product_id,
                'size_id' => $size_id,
                'qty' => $qty,
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            //dd($last_cart_item);

            //return response()->json($last_cart_item,  201);
            return response()->json(['success' => true, 'last_cart_item' => $last_cart_item], 201);
            //return Response::json(array('success' => true,'last_id'=>$last_cart_item), 200);
        }
        /*$cart_items = Cart::where('cart_id', '=', $cart_id)
            ->with('product')
            ->with('ProductImages')
            ->with('sizenames')
            ->orderBy('updated_at', 'desc')
            ->get();



        return $cart_items;*/


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
        //Session::flash('message', 'Successfully deleted the cart item!');


        return redirect()->action('CartController@index');
    }


    /**
     * Remove the specified resource from storage via ajax request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function json_destroy(Request $request, $id)
    {
        $cart_id = $request->cookie('cart_id');
        $item = Cart::where('id', '=', $id)->where('cart_id', '=', $cart_id)->firstOrFail();

        $item->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the cart item!');


       // return redirect()->action('CartController@index');
    }
}
