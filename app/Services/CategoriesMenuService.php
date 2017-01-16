<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesMenuService extends Model
{
    public function get_categories_menu()
    {
        $categoriesMenu = Category::where('parent_id', '=', 0)->get();

        return $categoriesMenu;
    }



        public function get_all_categories_menu()
        {
            $allCategoriesMenu = Category::pluck('title','slug','id')->get();

            return $allCategoriesMenu;
        }

}