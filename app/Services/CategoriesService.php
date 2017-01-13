<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesService extends Model
{
    public function get_categories($mainCategorySlug)
    {
        //  man -> 1
        //$mainCategorySlug = 'men';
        $mainCategory = Category::where(function($q) use ($mainCategorySlug) {
            $q->whereSlug($mainCategorySlug);
            $q->where('parent_id', '=', 0);
        })->firstOrFail();

        $mainCategoryId = $mainCategory->id;


        $categories = Category::where('parent_id', '=', $mainCategoryId)->get();

        return $categories;

    }


/*
    public function get_all_categories()
    {
        $allCategories = Category::pluck('title','slug','id')->all();

        return $allCategories;
    }*/

}