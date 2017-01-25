<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Product;


class BaseService extends Model
{
    public function get_favorites_base()
    {
        $favorites = Product::where('products.featured', '=', 1)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return $favorites;
    }

    public function get_new_arrivals_base()
    {
        $new_arrivals = Product::where('new', '=', 1)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return $new_arrivals;
    }

    public function get_promotions_base()
    {
        $promotions = Product::where('custom_discount', '!=', null)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return $promotions;
    }




}