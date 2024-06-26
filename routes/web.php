<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Recipe;

// Public routes
Route::get('/', function () {
    $publicRecipes = Recipe::where('is_private', false)->get();
    return view('welcome', compact('publicRecipes'));
})->name('home');

Route::get('/recipe/{id}', [RecipeController::class, 'publicShow'])->name('recipe.publicShow');

// Dashboard route (redirects authenticated users to dashboard)
Route::get('/dashboard', [RecipeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/info', function () {
    return view('info');
})->name('info');

// Contact routes
Route::post('/submit-contact-form', [ContactController::class, 'submitForm'])->name('submit_contact_form');
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/submit_contact_form', [ContactController::class, 'submitForm'])->name('submit_contact_form');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [RecipeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.show');

    // Recipes routes
    Route::prefix('recipes')->group(function () {
        Route::get('/create', [RecipeController::class, 'create'])->name('recipes.create');
        Route::post('/store', [RecipeController::class, 'store'])->name('recipes.store');
        Route::get('/mine', [RecipeController::class, 'myRecipes'])->name('recipes.mine');
        Route::get('/public', [RecipeController::class, 'publicRecipes'])->name('recipes.public');
        Route::get('/liked', [RecipeController::class, 'likedRecipes'])->name('recipes.liked');
        Route::post('/{recipe}/like', [RecipeController::class, 'likeRecipe'])->name('recipes.like');
        Route::get('/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
        Route::get('/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
        Route::put('/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
        Route::delete('/{recipe}/destroy', [RecipeController::class, 'destroy'])->name('recipes.destroy');
    });

    // Admin routes
    Route::prefix('admin')->group(function () {
        Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
        Route::get('/messages/{id}/read', [AdminController::class, 'markMessageAsRead'])->name('admin.markMessageAsRead');
        Route::delete('/{recipe}', [AdminController::class, 'destroy'])->name('admin.destroy');
    });

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/edit', function () {
            return view('profile.edit');
        })->name('profile.edit')->middleware('verified');

        Route::patch('/update', function () {
            // Logic to update profile
            return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
        })->name('profile.update')->middleware('verified');

        Route::delete('/destroy', function () {
            // Logic to delete profile
            return redirect()->route('dashboard')->with('success', 'Profile deleted successfully!');
        })->name('profile.destroy')->middleware('verified');
    });
});

// Auth routes (located in 'routes/auth.php')
require __DIR__.'/auth.php';
