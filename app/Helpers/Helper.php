<?php

namespace App\Helpers;

use App\Models\Category;

class Helper
{
    public static function cart_count()
    {
        try {
            $cartItems = json_decode($_COOKIE['cart'], true) ?? [];
            return count($cartItems);
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function get_categories()
    {
        return Category::select('id', 'name')->get();
    }
}
