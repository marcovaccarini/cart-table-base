<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;


class TagsController extends Controller
{
    public function index(Request $request, $tags)
    {
        $products_list = Tag::where('slug', '=', $tags)->firstOrFail();

        $url = $request->url();

        return view('products.tagShow', compact('products_list', 'url'));

    }
    /**
     * Display a listing of the resource for admin area.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_home()
    {
        return 'OK!';
    }

    /**
     * Display a listing of the resource for admin area.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        return 'OK!';
    }

    /**
     * Show the form for creating a new resource on admin area.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_create()
    {
        return 'OK!';
    }

}
