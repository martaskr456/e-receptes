<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepšu e-grāmata</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>
    <div id="banner" style="background-image: url('{{ asset('images/banner-image.png') }}');">
        <div class="banner-content">Recepšu e-grāmata</div>
    </div>
    <div class="login-register">
        <section id="login">
            <form action="{{ route('login') }}" method="GET">
                @csrf
                <button type="submit">Ienākt</button>
            </form>
        </section>
        
        <p>vai</p>
        <section id="register">
            <form action="{{ route('register') }}" method="GET">
                @csrf
                <button type="submit">Reģistrēties</button>
            </form>
        </section>
    </div>

    <section id="public-recipes">
        <div class="recipe-grid">
            @foreach($publicRecipes as $recipe)
                <article class="recipe">
                    <a href="{{ route('recipe.publicShow', $recipe->id) }}">
                        <img src="{{ str_starts_with($recipe->image, 'images/') ? asset($recipe->image) : asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
                    </a>
                    <div class="recipe-data">
                        <div class="recipe-title">{{ $recipe->title }}</div>
                        <div class="recipe-time">{{ $recipe->cooking_time }} min</div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

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

