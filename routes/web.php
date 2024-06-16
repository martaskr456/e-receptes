<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard route (redirects authenticated users to dashboard)
Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


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

// Dashboard route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Recipes routes
    Route::prefix('recipes')->group(function () {
        Route::get('/create', [RecipeController::class, 'create'])->name('recipes.create');
        Route::post('/', [RecipeController::class, 'store'])->name('recipes.store');
        Route::get('/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
        Route::put('/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
        Route::delete('/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
    });

    // Admin routes
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
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
