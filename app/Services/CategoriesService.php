<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesService extends Model
{
    /**
     * Use for accordeon menu on the left of category page
     * @param $mainCategorySlug
     * @return mixed
     */
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

    public function admin_categories($id)
    {
        $subCategoryId = Product::find($id)->category_id; // 3
        $subCategories = Category::where('parent_id', '=', $subCategoryId)->pluck('title', 'id');

        $categoryId = Category::find($subCategoryId)->parent_id; // 1
        $categories = Category::where('parent_id', '=', $categoryId)->pluck('title', 'id');

        $mainCategoryId = Category::find($categoryId)->pluck('title', 'id');
        $mainCategories = Category::where('parent_id', '=', 0)->get();

        return $mainCategories;
        //return compact('subCategoryId', 'categoryId', 'mainCategoryId', 'subCategories', 'categories', 'mainCategories');
    }

    public function sub_category_id($id)
    {
        $subCategoryId = Product::find($id)->category_id; // 3

        return $subCategoryId;
    }

    public function sub_categories($id)
    {
        $categoryId = Category::find($this->sub_category_id($id))->parent_id; // 1
        //$subCategories = Category::where('parent_id', '=', $this->category_id($id))->get();
        return $categoryId;
    }

    public function all_sub_categories($id)
    {
        $allSubCategories = Category::where('parent_id', '=', $this->sub_categories($id))->get();
        //dd($this->sub_categories($id));
        return $allSubCategories;
    }
    public function category_id($id)
    {
        $categoryId = Category::find($this->sub_categories($id))->parent_id; // 3
        return $categoryId;
    }

    public function categories($id)
    {
        $categories = Category::where('parent_id', '=', $this->category_id($id))->get();

        return $categories;
    }

    public function main_category_id($id)
    {
        $mainCategoryId = Category::find($this->category_id($id))->id;
        return $mainCategoryId;
    }

    public function main_categories()
    {
        $mainCategories = Category::where('parent_id', '=', 0)->get();
        return $mainCategories;
    }

    

/*
    public function get_all_categories()
    {
        $allCategories = Category::pluck('title','slug','id')->all();

        return $allCategories;
    }*/

}