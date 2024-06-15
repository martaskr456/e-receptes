<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('welcome', compact('recipes'));
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    public function create()
    {
        // Method to show a form to create a new recipe
    }

    public function store(Request $request)
    {
        // Method to store a new recipe based on form submission
    }

    // Other methods like edit, update, destroy as per your application's needs
}
