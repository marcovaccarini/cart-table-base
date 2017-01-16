<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mainCategorySlug,$categorySlug, Request $request)
    {
        //  man -> 1
        $mainCategory = Category::where(function($q) use ($mainCategorySlug) {
            $q->whereSlug($mainCategorySlug);
            $q->where('parent_id', '=', 0);
        })->firstOrFail();

        $mainCategoryId = $mainCategory->id;

        //  tops
        $category = Category::where(function($q) use ($categorySlug, $mainCategoryId) {
            $q->whereSlug($categorySlug);
            $q->where('parent_id', '=', $mainCategoryId);
        })->firstOrFail();

        $categoryId = $category->id;

        //  polos
        $subCategories = Category::where(function($q) use ($categoryId) {
            $q->where('parent_id', '=', $categoryId);
        })
        ->get();

        //  AND FINALLY THE PRODUCT
        $products = Product::where(function($q) use ($subCategories) {
            foreach ($subCategories as $key => $value) {
                $q->orWhere('category_id', '=', $value->id);
            }
        })->with('images')->with('sizes')->with('tags')
        ->inRandomOrder()
        ->get();
//dd($products);
        $url = $request->url();
        /*TODO: not return all the collection but only what needed*/
        /*TODO: add pagination*/

        //  moved to a specific service
        /*$categories = Category::where('parent_id', '=', $mainCategoryId)->get();
        */
        $allCategories = Category::pluck('title','slug','id')->all();

        //dd($categories);

        return view('products.categoryShow',compact('mainCategory', 'category', 'products', 'url'));
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