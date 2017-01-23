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
}
