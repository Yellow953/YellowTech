<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('analytics')->except(['contact_create', 'custom_logout']);
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|required|max:255',
            'message' => 'required',
            'g-recaptcha-response' => 'required',
            'spam' => 'required|numeric',
        ]);

        if ($request->spam != 19) {
            return redirect()->back()->with('danger', 'Something Went Wrong...');
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $validated['g-recaptcha-response'],
            'remoteip' => $request->ip()
        ]);

        $responseBody = $response->json();

        if (!$responseBody['success'] || $responseBody['score'] < 0.5) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['recaptcha' => 'Failed reCAPTCHA verification. Please try again.']);
        }

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ];

        Mail::to(env('MAIL_USERNAME'))->send(new ContactFormMail($data));

        return redirect()->back()->with('success', 'Thank you for your message! We will contact you as soon as we can...');
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
        $category = Category::where('name', urldecode($category_name))->firstOrFail();
        $products = Product::where('category_id', $category->id)->filter()->paginate(15);
        $data = compact('products', 'category');

        return view('shop', $data);
    }

    public function product($category_name, $product_name)
    {
        $category = Category::where('name', urldecode($category_name))->firstOrFail();
        $product = Product::where('name', urldecode($product_name))->firstOrFail();
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
        return redirect()->route('login');
    }
}
