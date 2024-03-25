<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Product;

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

    public static function get_conditions()
    {
        $conditions = ['new', 'used', 'open box', 'refurbished'];
        return $conditions;
    }

    public static function get_currencies()
    {
        $conditions = ['USD', 'LBP'];
        return $conditions;
    }

    public static function get_project_statuses()
    {
        $statuses = ['active', 'pending', 'hold'];
        return $statuses;
    }

    public static function get_invoice_statuses()
    {
        $statuses = ['unpaid', 'partially paid', 'paid'];
        return $statuses;
    }

    public static function get_product($productID)
    {
        return Product::find($productID);
    }
}
