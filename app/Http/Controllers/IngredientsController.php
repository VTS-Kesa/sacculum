<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientsController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();

        return view('ingredients.index')->with('ingredients', $ingredients);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:ingredients|max:64',
        ]);

        $ingredient = Ingredient::create([
            'name' => $request->name,
        ]);

        return back()->with('message', 'Ingredient created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:ingredients|max:64',
        ]);

        $ingredient = Ingredient::findOrFail($request->id);

        $ingredient->update([
            'name' => $request->name,
        ]);

        return back()->with('message', 'Ingredient updated successfully.');
    }

    public function delete(Request $request)
    {
        $ingredient = Ingredient::findOrFail($request->id);

        $ingredient->delete();

        return back()->with('message', 'Ingredient deleted successfully.');
    }
}
