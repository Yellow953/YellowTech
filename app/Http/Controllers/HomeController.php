<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('custom_logout');
    }

    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|required|max:255',
            'message' => 'required'
        ]);

        return redirect()->back()->with('success', 'Thank you for your message...');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    public function service()
    {
        return view('service');
    }

    public function shop($category_name)
    {
        $category = Category::where('name', $category_name)->firstOrFail();
        $products = Product::where('category_id', $category->id)->filter()->paginate(15);
        $data = compact('products', 'category');

        return view('shop', $data);
    }

    public function product($category_name, $product_name)
    {
        $category = Category::where('name', $category_name)->firstOrFail();
        $product = Product::where('name', $product_name)->firstOrFail();
        $data = compact('product', 'category');

        return view('product', $data);
    }

    public function privacy_policy()
    {
        return view('policies.privacy_policy');
    }

    public function terms_and_conditions()
    {
        return view('policies.terms_and_conditions');
    }

    public function custom_logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function ticket()
    {
        return view('ticket');
    }
}
