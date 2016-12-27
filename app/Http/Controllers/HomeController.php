<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $featureds = Product::where('featured', '=', 1)
            ->inRandomOrder()
            ->take(5)
            ->with('images')
            ->with('category')
            ->get();
//dd($featureds);
        //$discounted_price = $featureds->price - (($featureds->price / 100) * $featureds->custom_discount);

        $newarrivals = Product::where('new', '=', 1)
            ->inRandomOrder()
            ->take(5)
            ->with('images')
            ->with('category')
            ->get();
        //dd($newarrivals);
        $promotions = Product::where('custom_discount', '!=', null)
            ->inRandomOrder()
            ->take(5)
            ->with('images')
            ->with('category')
            ->get();
//dd($promotions);
        return view('home', compact('newarrivals', 'featureds', 'promotions'));





    }


}
