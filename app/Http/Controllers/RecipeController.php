<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('recipes.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'cooking_time' => 'required|integer',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_private' => 'sometimes|boolean',
            'image' => 'required|image|max:2048',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['image'] = $request->file('image')->store('recipe_images', 'public');

        Recipe::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Recepte veiksmīgi pievienota!');
    }
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'cooking_time' => 'required|integer|min:1',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|max:2048', // ja tiek iesniegta jauna bilde
            'category_id' => 'required|exists:categories,id',
            'is_private' => 'boolean',
        ]);

        $recipe->title = $validatedData['title'];
        $recipe->cooking_time = $validatedData['cooking_time'];
        $recipe->ingredients = $validatedData['ingredients'];
        $recipe->instructions = $validatedData['instructions'];
        $recipe->category_id = $validatedData['category_id'];
        $recipe->is_private = $request->has('is_private');

        // Ja ir jauna bilde, augšupielādējam un saglabājam to
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $recipe->image = $imagePath;
        }

        $recipe->save();

        return redirect()->route('dashboard')->with('success', 'Recepte atjaunināta veiksmīgi!');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('dashboard')->with('success', 'Recepte dzēsta veiksmīgi!');
    }
}