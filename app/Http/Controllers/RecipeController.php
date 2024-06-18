<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function dashboard(Request $request)
    {
        $categories = Category::all();
        $recipes = Recipe::query();

        if ($request->has('category') && !in_array('all', $request->category)) {
            $recipes->whereIn('category_id', $request->category);
        }

        if ($request->filled('sort')) {
            $order = $request->input('order', 'asc');
            $recipes->orderBy($request->sort, $order);
        } else {
            $recipes->orderBy('title');
        }

        $recipes = $recipes->get();

        return view('dashboard', compact('recipes', 'categories'));
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function create()
    {
        $categories = Category::all();
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
            'visibility' => 'required|in:private,public',
            'image' => 'required|image|max:5120', // Maksimālais izmērs 5 MB
        ]);
    
        $validatedData['user_id'] = Auth::id();
        $validatedData['is_private'] = $request->visibility === 'private';
    
        // Saglabā attēlu publiskajā direktorijā
        $validatedData['image'] = $request->file('image')->store('recipe_images', 'public');
    
        Recipe::create($validatedData);
    
        return redirect()->route('dashboard')->with('success', 'Recepte veiksmīgi pievienota!');
    }
    

    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'cooking_time' => 'required|integer|min:1',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'required|image|max:5120',
            'category_id' => 'required|exists:categories,id',
            'is_private' => 'boolean',
        ]);

        $recipe->title = $validatedData['title'];
        $recipe->cooking_time = $validatedData['cooking_time'];
        $recipe->ingredients = $validatedData['ingredients'];
        $recipe->instructions = $validatedData['instructions'];
        $recipe->category_id = $validatedData['category_id'];
        $recipe->is_private = $request->has('is_private');

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
