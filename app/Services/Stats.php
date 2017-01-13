<?php

namespace App\Services;


class Stats
{
    /* public function get_categories()
     {
         //  man -> 1
         $mainCategorySlug = 'men';
         $mainCategory = Category::where(function($q) use ($mainCategorySlug) {
             $q->whereSlug($mainCategorySlug);
             $q->where('parent_id', '=', 0);
         })->firstOrFail();

         $mainCategoryId = $mainCategory->id;

         $categories = Category::where('parent_id', '=', $mainCategoryId)->get();



     }*/

    public function lessons()
    {
        return 450;
    }
    /*
        public function get_all_categories()
        {
            $allCategories = Category::pluck('title','slug','id')->all();

            return $allCategories;
        }*/

}