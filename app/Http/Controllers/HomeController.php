<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $featureds = Product::where('products.featured', '=', 1)
            ->join('categories', function ($join) {
                $join->on('products.category_id', '=', 'categories.id');
            })
            ->join('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.id');
            })->where('product_images.featured', '=', 1)
            ->select('products.id', 'product_name', 'new', 'products.slug', 'price', 'category_id', 'tax', 'custom_discount', 'title', 'filename')
            ->inRandomOrder()
            ->take(5)
            ->get();


        $newarrivals = Product::where('new', '=', 1)
            ->join('categories', function ($join) {
                $join->on('products.category_id', '=', 'categories.id');
            })
            ->join('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.id');
            })->where('product_images.featured', '=', 1)
            ->select('products.id', 'product_name', 'new', 'products.slug', 'price', 'category_id', 'tax', 'custom_discount', 'title', 'filename')
            ->inRandomOrder()
            ->take(5)
            ->get();


        $promotions = Product::where('custom_discount', '!=', null)
            ->join('categories', function ($join) {
                $join->on('products.category_id', '=', 'categories.id');
            })
            ->join('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.id');
            })->where('product_images.featured', '=', 1)
            ->select('products.id', 'product_name', 'new', 'products.slug', 'price', 'category_id', 'tax', 'custom_discount', 'title', 'filename')
            ->inRandomOrder()
            ->take(5)
            ->get();




      /*  $promotions = Product::where('custom_discount', '!=', null)
            ->inRandomOrder()
            ->take(5)
            ->with('images')
            ->with('category')
            ->get();*/
//dd($promotions);
        return view('home', compact('newarrivals', 'featureds', 'promotions'));





    }


}
