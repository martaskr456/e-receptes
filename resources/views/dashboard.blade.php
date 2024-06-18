<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sākums - e-Receptes</title>
    <link rel="stylesheet" href="{{ asset('css/styles_auth.css') }}">
    <style>
        .category-dropdown {
            position: relative;
            display: inline-block;
        }

        .category-dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .category-dropdown-content label {
            display: block;
            padding: 10px;
            cursor: pointer;
        }

        .category-dropdown:hover .category-dropdown-content {
            display: block;
        }

        .filters label, .filters select, .filters button {
            font-size: 1.2em;
            font-weight: bold;
            margin-right: 10px;
        }

        .sort-button {
            background-color: #FF8C00;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sort-button:hover {
            background-color: #e67e00;
        }

        .sort-button .arrow {
            font-size: 0.8em;
            margin-left: 5px;
        }

        section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        article.recipe {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        article img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .recipe-title {
            font-size: 1.5em;
            color: rgb(64, 64, 131);
            font-weight: bold;
            margin-top: 10px;
        }

        .recipe-time {
            font-size: 1.2em;
            color: rgba(64, 64, 131, 0.7);
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <nav class="filters-nav">
        <form id="filter-form" method="GET" action="{{ route('dashboard') }}">
            <div class="filters">
                <label for="sort">Kārtošana pēc:</label>
                <select id="sort" name="sort" onchange="document.getElementById('filter-form').submit();">
                    <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Nosaukums</option>
                    <option value="cooking_time" {{ request('sort') == 'cooking_time' ? 'selected' : '' }}>Gatavošanas laiks</option>
                </select>
                <button type="button" class="sort-button" onclick="toggleSortOrder()">
                    <span class="arrow" id="sort-arrow">{{ request('order', 'asc') == 'asc' ? '↑' : '↓' }}</span>
                </button>
                <input type="hidden" name="order" id="order" value="{{ request('order', 'asc') }}">
                <span style="margin-left: 20px; font-size: 1.2em; font-weight: bold;">Filtrēšana pēc:</span>
                <div class="category-dropdown" style="margin-left: 20px;">
                    <button type="button">Kategorijas</button>
                    <div class="category-dropdown-content">
                        <label><input type="checkbox" name="category[]" value="all" {{ !request()->has('category') || in_array('all', request('category', [])) ? 'checked' : '' }} onchange="toggleCheckboxes(this)"> Visas kategorijas</label>
                        @foreach($categories as $category)
                            <label><input type="checkbox" name="category[]" value="{{ $category->id }}" {{ request()->has('category') && in_array($category->id, request('category', [])) ? 'checked' : '' }}> {{ $category->name }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" style="display: none;">Filtrēt</button>
        </form>
        <a href="{{ route('recipes.create') }}" class="add-recipe-btn">Pievienot</a>
    </nav>

    <main>
        <section>
            @foreach($recipes as $recipe)
                <article class="recipe">
                    <a href="{{ route('recipes.show', $recipe->id) }}">
                        <img src="{{ str_starts_with($recipe->image, 'images/') ? asset($recipe->image) : asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
                    </a>
                    <div class="recipe-data">
                        <div class="recipe-title">{{ $recipe->title }}</div>
                        <div class="recipe-time">{{ $recipe->cooking_time }} min</div>
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

    <script>
        function toggleCheckboxes(source) {
            checkboxes = document.getElementsByName('category[]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = source.checked;
            }
            document.getElementById('filter-form').submit();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.category-dropdown-content input[type="checkbox"]').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.value !== 'all') {
                        document.querySelector('input[name="category[]"][value="all"]').checked = false;
                    } else {
                        document.querySelectorAll('.category-dropdown-content input[type="checkbox"]').forEach(function(cb) {
                            cb.checked = checkbox.checked;
                        });
                    }
                    document.getElementById('filter-form').submit();
                });
            });
        });

        function toggleSortOrder() {
            var orderField = document.getElementById('order');
            var sortArrow = document.getElementById('sort-arrow');
            if (orderField.value === 'asc') {
                orderField.value = 'desc';
                sortArrow.textContent = '↓';
            } else {
                orderField.value = 'asc';
                sortArrow.textContent = '↑';
            }
            document.getElementById('filter-form').submit();
        }
    </script>
</body>
</html>
