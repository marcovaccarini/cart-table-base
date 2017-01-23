<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductImage;
use App\Tag;
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
            ->inRandomOrder()
            ->take(5)
            ->get();


        $newarrivals = Product::where('new', '=', 1)
            ->inRandomOrder()
            ->take(5)
            ->get();


        $promotions = Product::where('custom_discount', '!=', null)
            ->inRandomOrder()
            ->take(5)
            ->get();

        $favorite_tags = Tag::where('favorite', '=', 1)->get();

        $favorite_categories = Category::where('favorite', '=', 1)->get();

        return view('home', compact('newarrivals', 'featureds', 'promotions', 'favorite_tags', 'favorite_categories'));

    }

}
