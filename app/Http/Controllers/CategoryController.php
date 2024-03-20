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
        $categories = Category::all();
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

        Category::create($request->all());
        $text = "Category " . $request->name . " created, datetime: " . now();

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

        $category->update($request->all());
        $text = "Category " . $category->name . " updated, datetime: " . now();

        Log::create(['text' => $text]);
        return redirect()->route('categories')->with('success', 'Category was successfully updated.');
    }

    public function destroy(Category $category)
    {
        $text = "Category " . $category->name . " deleted, datetime: " . now();

        $category->delete();
        Log::create(['text' => $text]);

        return redirect()->back()->with('danger', 'Category was successfully deleted');
    }
}
