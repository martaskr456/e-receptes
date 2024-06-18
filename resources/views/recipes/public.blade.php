<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publiskās Receptes - e-Receptes</title>
    <link rel="stylesheet" href="{{ asset('css/styles_recipes.css') }}">
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <main>
        <section>
            @foreach($recipes as $recipe)
                <article class="recipe">
                    <a href="{{ route('recipes.show', $recipe->id) }}">
                        <img src="{{ str_starts_with($recipe->image, 'images/') ? asset($recipe->image) : asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
                    </a>
                    <div class="recipe-data">
                        <div>
                            <div class="recipe-title">{{ $recipe->title }}</div>
                            <div class="recipe-time">{{ $recipe->cooking_time }} min</div>
                        </div>
                        <div>
                            <form action="{{ route('recipes.like', $recipe->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="like-button">
                                    <span class="{{ Auth::user()->likedRecipes->contains($recipe->id) ? 'liked' : 'unliked' }}">&#9829;</span>
                                </button>
                            </form>
                            <div class="recipe-author">{{ $recipe->user->name }}</div>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    </main>

    <footer>
        <p>
            &copy; <span id="info">2024 <br></span>
            <span class="footer-logo">TT2 eksāmena darbs - </span>
            <strong><i>"E-receptes" </i></strong><br>
            Autors: <ins>Marta Karīna Skrastiņa (mk23123) & Ivo Aļļēns (ia23031)</ins>
        </p>
    </footer>
</body>
</html>
