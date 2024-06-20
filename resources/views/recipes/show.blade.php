<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recipe->title }} - e-Receptes</title>
    <link rel="stylesheet" href="{{ asset('css/styles_recipes.css') }}">
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <main>
        <div class="recipe-container">
            <div class="recipe-header">
                <h1>{{ $recipe->title }}</h1>
                <div class="recipe-meta">
                    <span class="recipe-time">{{ $recipe->cooking_time }} min</span>
                    <span class="recipe-author">Autors: {{ $recipe->user->name }}</span>
                </div>
            </div>
            <div class="recipe-image">
                <img src="{{ str_starts_with($recipe->image, 'images/') ? asset($recipe->image) : asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
            </div>
            <div class="recipe-details">
                <h2>Sastāvdaļas</h2>
                <p>{{ $recipe->ingredients }}</p>
                <h2>Pagatavošana</h2>
                <p>{{ $recipe->instructions }}</p>
            </div>
            <form action="{{ route('recipes.like', $recipe->id) }}" method="POST">
                @csrf
                <button type="submit" class="like-button">
                    <span class="{{ Auth::user()->likedRecipes->contains($recipe->id) ? 'liked' : 'unliked' }}">&#9829;</span>
                </button>
            </form>
        </div>
    </main>

    <footer>
        <p>
            &copy; <span id="info">2024 <br></span>
            <span class="footer-logo">TT2 eksāmena darbs - </span>
            <strong><i>"E-receptes" </i></strong><br>
            Autors: <ins>Marta Karīna Skrastiņa (ms23123) & Ivo Aļļēns (ia23031)</ins>
        </p>
    </footer>
</body>
</html>
