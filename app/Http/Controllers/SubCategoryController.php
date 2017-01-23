<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubCategoryController extends Controller
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
    public function show($mainCategorySlug,$categorySlug,$subCategorySlug, Request $request)
    {
        //  man
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
        $subCategory = Category::where(function($q) use ($subCategorySlug, $categoryId) {
            $q->whereSlug($subCategorySlug);
            $q->where('parent_id', '=', $categoryId);
        })->firstOrFail();
        $subCategoryId = $subCategory->id;

        //  AND FINALLY THE PRODUCT
        $products = Category::where('id', '=', $subCategoryId)->firstOrFail();

        $url = $request->url();

        return view('products.subCategoryShow', compact('mainCategory', 'category', 'products', 'url'));
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
