<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Product;


class ProductsController extends Controller
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
        $mainCategories = Category::where('parent_id', '=', 0)
            /*->lists("title","id");*/
            ->get();

        //dd($mainCategory);

        return view('admin.products.create',compact('mainCategories'));
    }

    /**
     * Get Ajax Request and return Data for categories
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_cat($id)
    {
        $categories = Category::where('parent_id', '=', $id)->pluck('title', 'id');

        return json_encode($categories);
    }


    /**
     * Get Ajax Request and return Data for sub categories
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_sub_cat($id)
    {
        $subCategories = Category::where('parent_id', '=', $id)->pluck('title', 'id');

        return json_encode($subCategories);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'main_category' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
        ]);
        $main_categoryId = request('main_category');
        $main_category = Category::find($main_categoryId);

        $categoryId = request('category');
        $category = Category::find($categoryId);

        $sub_categoryId = request('sub_category');
        $sub_category = Category::find($sub_categoryId);

        $products_list = Product::where('category_id', '=', $sub_categoryId)
            ->orderBy('product_name', 'desc')
            ->get();

        return view('admin.products.store',compact('main_category', 'category', 'sub_category', 'products_list'));
        //dd(request()->all());
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
