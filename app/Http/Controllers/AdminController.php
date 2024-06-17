<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class AdminController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('admin.index', compact('recipes'));
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('admin.index');
    }
}
