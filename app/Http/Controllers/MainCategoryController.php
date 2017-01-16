<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainCategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mainCategorySlug, Request $request)
    {
        //  man -> 1
        $mainCategory = Category::where(function($q) use ($mainCategorySlug) {
            $q->whereSlug($mainCategorySlug);
            $q->where('parent_id', '=', 0);
        })->firstOrFail();

        $mainCategoryId = $mainCategory->id;

        //  tops
        $category = Category::where(function($q) use ($mainCategoryId) {

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

        return view('products.mainCategoryShow',compact('mainCategory', 'category', 'products', 'url'));
    }
}
