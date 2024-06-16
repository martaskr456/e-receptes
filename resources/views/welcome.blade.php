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
        <h2>Public Recipes</h2>
        <!-- Add a grid or list of public recipes (photo, title, cooking time) -->
    </section>
</body>
</html>


