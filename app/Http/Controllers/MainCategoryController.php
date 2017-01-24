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
        /*TODO: refactoring this*/
        $featureds = Product::where('products.featured', '=', 1)
            ->join('categories', function ($join) {
                $join->on('products.category_id', '=', 'categories.id');
            })
            ->join('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.id');
            })->where('product_images.featured', '=', 1)
            ->select('products.id', 'product_name', 'new', 'products.slug', 'price', 'category_id', 'tax', 'custom_discount', 'categories.title', 'filename')
            ->inRandomOrder()
            ->take(5)
            ->get();

        $url = $request->url();

        /*TODO: add pagination*/

        //  moved to a specific service
        /*$categories = Category::where('parent_id', '=', $mainCategoryId)->get();
        */
        $allCategories = Category::pluck('title','slug','id')->all();

        //dd($categories);

        return view('products.mainCategoryShow',compact('mainCategory', 'category', 'featureds', 'url'));
    }
}
