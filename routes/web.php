<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AdminController;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Recipes routes
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
    Route::get('search', [RecipeController::class, 'search'])->name('recipes.search');

    // Admin routes
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('admin/{recipe}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Profile routes
    Route::get('profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit')->middleware('verified');

    Route::patch('profile/update', function () {
        // Logic to update profile
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    })->name('profile.update')->middleware('verified');

    Route::delete('profile/destroy', function () {
        // Logic to delete profile
        return redirect()->route('dashboard')->with('success', 'Profile deleted successfully!');
    })->name('profile.destroy')->middleware('verified');
});

// Auth routes
require __DIR__.'/auth.php';
