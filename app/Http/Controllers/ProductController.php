<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function new()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.products.new', compact('categories'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric|min:1',
            'buy_price' => 'required|numeric|min:1',
            'sell_price' => 'required|numeric|min:1',
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $image = Image::make($file);
            $image->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save(public_path('uploads/products/' . $filename));
            $product->image = '/uploads/products/' . $filename;
        } else {
            $product->image = "/assets/images/no_img.png";
        }

        $text = "Product " . $request->name . " created, datetime: " . now();
        Log::create(['text' => $text]);

        $product->save();
        return redirect()->route('products')->with('success', 'Product was successfully created.');
    }

    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        $data = compact('categories', 'product');

        return view('admin.products.edit', $data);
    }

    public function update(Request $request, Product $product)
    {
        if ($request->buy_price <= 0 || $request->sell_price <= 0) {
            return redirect()->back()->with('danger', 'Negative Values...');
        }

        $product->name = $request->name;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $image = Image::make($file);
            $image->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save(public_path('uploads/products/' . $filename));
            $product->image = '/uploads/products/' . $filename;
        }

        if ($request->category_id) {
            $product->category_id = $request->category_id;
        }

        $text = "Product " . $product->name . " updated, datetime: " . now();
        $product->save();
        Log::create(['text' => $text]);
        return redirect()->route('products')->with('success', 'Product was successfully updated.');
    }

    public function destroy(Product $product)
    {
        $text = "Product " . $product->name . " deleted, datetime: " . now();

        if ($product->image != '/assets/images/no_img.png') {
            $path = public_path($product->image);
            File::delete($path);
        }

        $product->delete();
        Log::create(['text' => $text]);
        return redirect()->back()->with('danger', 'Product was successfully deleted');
    }
}
