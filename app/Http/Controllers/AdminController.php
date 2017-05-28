<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Tag;
use App\Category;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {

        $this->middleware('auth');

    }


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        // display all orders of a user
        $orders = Order::orderBy('created_at', 'desc')
            ->with('status')
            ->take(7)
            ->get();
        //dd($orders);

        $featureds = Product::where('products.featured', '=', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();
        //dd($featureds);

        $newarrivals = Product::where('new', '=', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();
        //dd($newarrivals);

        $promotions = Product::where('custom_discount', '!=', null)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();
        //dd($promotions);

        $favorite_tags = Tag::where('favorite', '=', 1)->get();
        //dd($favorite_tags);

        $favorite_categories = Category::where('favorite', '=', 1)->get();

        return view('admin.home', compact('orders', 'featureds', 'newarrivals', 'promotions', 'favorite_tags', 'favorite_categories'));
        //return view('admin.home');

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function allUsers()
    {

        dd('Access All Users');

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function adminSuperadmin()
    {

        dd('Access Admin and Superadmin');

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function superadmin()
    {

        dd('Access only Superadmin');

    }

}