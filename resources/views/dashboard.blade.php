<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sākums - e-Receptes</title>
    <link rel="stylesheet" href="{{ asset('css/styles_auth.css') }}">
    <!-- Include any other CSS or JavaScript files -->
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <main>
        <section id="public-recipes">
            <h2>Publiskās receptes</h2>
            <!-- Display public recipes with sorting and filtering options -->
            <!-- Example: Add buttons or dropdowns for sorting and filtering -->
            <div class="sorting-options">
                <label for="sort">Kārtot pēc:</label>
                <select id="sort">
                    <option value="newest">Jaunākās</option>
                    <option value="popular">Populārākās</option>
                    <option value="top-rated">Visaugstāk novērtētās</option>
                </select>
                <!-- Add filter options if needed -->
            </div>
            <div class="recipe-list">
                <!-- Render public recipes dynamically -->
                <!-- Example: Loop through recipes and display them -->
                <div class="recipe">
                    <h3>Receptes nosaukums</h3>
                    <p>Laiks: xx min</p>
                    <img src="recipe-image.jpg" alt="Receptes attēls">
                </div>
                <!-- Repeat for other recipes -->
            </div>
        </section>

        <section id="my-recipes">
            <h2>Manas receptes</h2>
            <!-- Display recipes created by the user -->
            <!-- Example: List user's recipes with links to each recipe -->
            <div class="recipe">
                <h3>Manas receptes nosaukums</h3>
                <p>Laiks: xx min</p>
                <img src="recipe-image.jpg" alt="Manas receptes attēls">
            </div>
            <!-- Repeat for other user recipes -->
        </section>

        <section id="liked-recipes">
            <h2>Manas "Patīk" receptes</h2>
            <!-- Display recipes liked by the user -->
            <!-- Example: List liked recipes with links to each recipe -->
            <div class="recipe">
                <h3>Receptes nosaukums</h3>
                <p>Laiks: xx min</p>
                <img src="liked-recipe-image.jpg" alt="Receptes attēls">
            </div>
            <!-- Repeat for other liked recipes -->
        </section>
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

    <!-- Include any scripts you need -->
</body>
</html>




