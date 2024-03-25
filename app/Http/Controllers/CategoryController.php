<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $categories = Category::select('id', 'name', 'description')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function new()
    {
        return view('admin.categories.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $text = ucwords(auth()->user()->name) .  " created Category " . $request->name . ", datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('categories')->with('success', 'Category was successfully created.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $text = ucwords(auth()->user()->name) .  " updated Category " . $category->name . ", datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('categories')->with('success', 'Category was successfully updated.');
    }

    public function destroy(Category $category)
    {
        $text = ucwords(auth()->user()->name) .  " deleted Category " . $category->name . ", datetime: " . now();
        $category->delete();
        Log::create(['text' => $text]);

        return redirect()->back()->with('danger', 'Category was successfully deleted');
    }
}
