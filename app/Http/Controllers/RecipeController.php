<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = [];
        $categories = Category::all();
        $ingredients = Ingredient::all();

        if (auth()->user()->role->slug === 'admin') {
            $recipes = Recipe::all();
        } else {
            $recipes = Recipe::all()->where('approved', true);
        }

        return view('recipe.index')->with('recipes', $recipes)->with('categories', $categories)->with('ingredients', $ingredients);
    }

    public function show(Request $request)
    {
        $recipe = Recipe::find($request->id);

        return view('recipe.show')->with('recipe', $recipe);
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'instructions' => ['required', 'string'],
            'ingredients.*' => ['required', 'integer'],
            'category' => ['required', 'integer'],
        ]);

        $recipe = new Recipe([
            'name' => $request->name,
            'slug' => $request->name,
            'instructions' => $request->instructions,
            'description' => $request->description,
            'instructions' => $request->instructions,
            'approved' => false,
        ]);

        $recipe->category()->associate($request->category);
        $recipe->save();

        $recipe->ingredients()->attach($request->ingredients);
        $recipe->save();

        return back()->with('message', 'Recipe created!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'instructions' => ['required', 'string'],
            'ingredients' => ['required', 'string'],
            /* 'category' => ['required', 'string'], */
        ]);

        $recipe = Recipe::find($request->id);

        $recipe->update([
            'name' => $request->name,
            'description' => $request->description,
            'instructions' => $request->instructions,
            'ingredients' => $request->ingredients,
            /* 'category' => $request->category, */
        ]);

        $recipe->save();

        return back()->with('message', 'Recipe updated!');
    }

    public function delete(Request $request)
    {
        $recipe = Recipe::find($request->id);
        $recipe->delete();

        return back()->with('message', 'Recipe deleted!');
    }

    public function approve(Request $request)
    {
        $recipe = Recipe::find($request->id);
        $recipe->approved = true;
        $recipe->save();

        return redirect()->route('recipe.index')->with('success', 'Recipe approved!');
    }

    public function disapprove(Request $request)
    {
        $recipe = Recipe::find($request->id);
        $recipe->approved = false;
        $recipe->save();

        return redirect()->route('recipe.index')->with('success', 'Recipe disapproved!');
    }
}
