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
    public function index()
    {
        //
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
            'sizeId' => 'required|numeric',
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
           // return redirect('products')->with('errors', 'The product is already in your cart!');
            //return 'The product is already in your cart!';
            //  TODO update the cart
        }

        // user_id is really necessary here?
        Cart::create([
            'cart_id' => $cart_id,
            'product_id' => $product_id,
            'size_id' => $size_id,
            'qty' => $qty,
        ]);

        $cart_items = Cart::where('cart_id', '=', $cart_id)
            ->with('product')
            ->with('ProductImages')
            ->with('sizenames')
            ->orderBy('updated_at', 'desc')
            ->get();

        $total=0;

        foreach($cart_items as $item){
            $total+=($item->product->price - ($item->product->price/100)*$item->product->custom_discount)*$item->qty;

            $subCategory = Category::where('id', '=', $item->product->category_id)->firstOrFail();
            $subCategorySlug = $subCategory->slug;
            $subCategoryId = $subCategory->id;
            $subCategoryId_parent = $subCategory->parent_id;
//            dd($subCategoryId);

            $category = Category::where('id', '=', $subCategoryId_parent)->firstOrFail();
            $categorySlug = $category->slug;
            $categoryId = $category->parent_id;


            $mainCategory = Category::where('id', '=', $categoryId)->firstOrFail();
            $mainCategorySlug = $mainCategory->slug;

            $path = '/'.$mainCategorySlug.'/'.$categorySlug.'/'.$subCategorySlug.'/'.$item->product->slug.'/';

            $cart_items->map(function ($cart_item) use ($path) {
                $cart_item['path'] = $path;

                return $cart_item;
            });
        }

        //return $cart_items->toJson();
        return [$cart_items, 'total'=>$total];

       // dd($cart);
        //  TODO make total cart

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
    public function destroy($id)
    {
        //
    }
}
