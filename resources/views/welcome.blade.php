<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-receptes</title>
    <style>
        /* Some basic styling, adjust as needed */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 1rem;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 1rem;
        }
        .banner {
            text-align: center;
            margin-top: 2rem;
        }
        .banner img {
            max-width: 100%;
        }
        .banner h2 {
            margin-top: 1rem;
            font-size: 2rem;
        }
        .recipe-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        .recipe-card {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            width: calc(33.33% - 1rem);
            text-align: center;
        }
        .recipe-card:hover {
            transform: translateY(-5px);
        }
        .recipe-card img {
            max-width: 100%;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div>
            <a href="{{ route('welcome') }}" style="font-weight: bold;">e-receptes</a>
        </div>
        <div>
            <a href="{{ route('welcome') }}">Sākums</a>
            <a href="{{ route('about') }}">Par</a>
            <a href="{{ route('contacts') }}">Kontakti</a>
        </div>
    </header>

    <div class="banner">
        <img src="/images/banner-image.jpg" alt="Recepšu e-grāmata">
        <h2>Recepšu e-grāmata</h2>
        <div>
            <a href="{{ route('login') }}" style="margin-right: 1rem;">Ienākt</a>
            <a href="{{ route('register') }}">Reģistrēties</a>
        </div>
    </div>

    <div class="recipe-list">
        @foreach ($recipes as $recipe)
            <div class="recipe-card">
                <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}">
                <h3>{{ $recipe->title }}</h3>
                <p>Pagatavošanas laiks: {{ $recipe->cooking_time }} min</p>
                <a href="{{ route('recipes.show', $recipe->id) }}">Skatīt recepti</a>
            </div>
        @endforeach
    </div>

</body>
</html>
