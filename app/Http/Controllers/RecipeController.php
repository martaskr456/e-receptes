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
        $recipes = Recipe::query()
            ->where(function ($query) {
                $query->where('is_private', false)
                    ->orWhere('user_id', Auth::id());
            });

        if ($request->has('category')) {
            $categoriesFilter = $request->category;
            if (!in_array('all', $categoriesFilter)) {
                $recipes->whereIn('category_id', $categoriesFilter);
            }
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

    // Pārējās metodes nemainītas

    public function myRecipes()
    {
        $recipes = Recipe::where('user_id', Auth::id())->get();
        return view('recipes.mine', compact('recipes'));
    }

    public function publicRecipes()
    {
        $recipes = Recipe::where('is_private', false)->get();
        return view('recipes.public', compact('recipes'));
    }

    public function likedRecipes()
    {
        $user = Auth::user();
        $recipes = $user->likedRecipes;
        return view('recipes.liked', compact('recipes'));
    }

    public function show(Recipe $recipe)
    {
        if ($recipe->is_private && $recipe->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

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
            'image' => 'required|image|max:5120',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['is_private'] = $request->visibility === 'private';

        $validatedData['image'] = $request->file('image')->store('recipe_images', 'public');

        Recipe::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Recepte veiksmīgi pievienota!');
    }

    public function edit(Recipe $recipe)
    {
        if ($recipe->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        $categories = Category::all();
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        if ($recipe->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'cooking_time' => 'required|integer|min:1',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'visibility' => 'required|in:private,public',
        ]);

        $recipe->title = $validatedData['title'];
        $recipe->cooking_time = $validatedData['cooking_time'];
        $recipe->ingredients = $validatedData['ingredients'];
        $recipe->instructions = $validatedData['instructions'];
        $recipe->category_id = $validatedData['category_id'];
        $recipe->is_private = $request->visibility === 'private';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $recipe->image = $imagePath;
        }

        $recipe->save();

        return redirect()->route('recipes.mine')->with('success', 'Recepte atjaunināta veiksmīgi!');
    }

    public function destroy(Request $request, Recipe $recipe)
    {
        if ($recipe->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        $recipe->delete();

        $redirect = $request->input('redirect', 'dashboard');
        if ($redirect === 'mine') {
            return redirect()->route('recipes.mine')->with('success', 'Recepte dzēsta veiksmīgi!');
        }

        return redirect()->route('dashboard')->with('success', 'Recepte dzēsta veiksmīgi!');
    }

    public function likeRecipe(Recipe $recipe)
    {
        $user = Auth::user();
        if ($user->likedRecipes()->where('recipe_id', $recipe->id)->exists()) {
            $user->likedRecipes()->detach($recipe->id);
        } else {
            $user->likedRecipes()->attach($recipe->id);
        }

        return redirect()->back();
    }

    public function publicShow($id)
    {
        $recipe = Recipe::findOrFail($id);

        if ($recipe->is_private) {
            abort(403, 'Unauthorized access to private recipe');
        }

        return view('recipes.public_show', compact('recipe'));
    }
}
