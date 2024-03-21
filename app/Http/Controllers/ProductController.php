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
        $products = Product::select('id', 'name', 'quantity', 'unit_cost', 'unit_price', 'compare_price', 'condition', 'category_id', 'image')->get();
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
            'name' => 'required|unique:products',
            'quantity' => 'required|numeric|min:1',
            'unit_cost' => 'required|numeric|min:1',
            'unit_price' => 'required|numeric|min:1',
            'category_id' => 'required',
            'condition' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $image = Image::make($file);
            $image->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save(public_path('uploads/products/' . $filename));
            $path = '/uploads/products/' . $filename;
        } else {
            $path = "/assets/images/no_img.png";
        }

        Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit_cost' => $request->unit_cost,
            'unit_price' => $request->unit_price,
            'compare_price' => $request->compare_price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'condition' => $request->condition,
            'keywords' => $request->keywords,
            'image' => $path,
        ]);

        $text = auth()->user()->name . " created Product: " . $request->name . ", datetime: " . now();
        Log::create(['text' => $text]);

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
        $request->validate([
            'name' => 'required',
            'unit_cost' => 'required|numeric|min:1',
            'unit_price' => 'required|numeric|min:1',
            'category_id' => 'required',
            'condition' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $image = Image::make($file);
            $image->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save(public_path('uploads/products/' . $filename));
            $path = '/uploads/products/' . $filename;
        } else {
            $path = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'unit_cost' => $request->unit_cost,
            'unit_price' => $request->unit_price,
            'compare_price' => $request->compare_price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'condition' => $request->condition,
            'keywords' => $request->keywords,
            'image' => $path,
        ]);

        $text = auth()->user()->name . " update Product: " . $request->name . ", datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('products')->with('success', 'Product was successfully updated.');
    }

    public function destroy(Product $product)
    {
        $text = auth()->user()->name . "deleted Product: " . $product->name . " deleted, datetime: " . now();

        if ($product->image != '/assets/images/no_img.png') {
            $path = public_path($product->image);
            File::delete($path);
        }

        $product->delete();
        Log::create(['text' => $text]);

        return redirect()->back()->with('danger', 'Product was successfully deleted');
    }

    public function images(Product $product)
    {
        return view('admin.products.images', compact('product'));
    }
}
