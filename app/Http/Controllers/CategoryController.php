<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Cocur\Slugify\Slugify;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index')->with('categories', $categories);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:categories'],
        ]);

        $slugify = new Slugify();

        Category::create([
            'name' => $request->name,
            'slug' => $slugify->slugify($request->name),
        ]);

        return back()->with('message', 'Category created!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:categories'],
        ]);

        $slugify = new Slugify();

        $category = Category::where('slug', $request->slug)->firstOrFail();

        $category->update([
            'name' => $request->name,
            'slug' => $slugify->slugify($request->name),
        ]);

        return back()->with('message', 'Category updated!');
    }

    public function delete(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->delete();

        return back()->with('message', 'Category deleted!');
    }
}
