<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manas Receptes</title>
    <link rel="stylesheet" href="{{ asset('css/styles_mine.css') }}">
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>
    
    <nav class="filters-nav">
        <form id="filter-form" method="GET" action="{{ route('recipes.mine') }}">
            <div class="filters">
                <label for="sort">Kārtošana pēc:</label>
                <select id="sort" name="sort" onchange="document.getElementById('filter-form').submit()">
                    <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Nosaukums</option>
                    <option value="cooking_time" {{ request('sort') == 'cooking_time' ? 'selected' : '' }}>Gatavošanas laiks</option>
                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Pievienošanas laiks</option>
                </select>
                <button type="button" class="sort-button" onclick="toggleSortOrder()">
                    <span class="arrow" id="sort-arrow">{{ request('order', 'asc') == 'asc' ? '↑' : '↓' }}</span>
                </button>
                <input type="hidden" name="order" id="order" value="{{ request('order', 'asc') }}">
                <span style="margin-left: 20px; font-size: 1.2em; font-weight: bold;">Filtrēšana pēc:</span>
                <div class="category-dropdown" style="margin-left: 20px;">
                    <button type="button">Kategorijas</button>
                    <div class="category-dropdown-content">
                        <label><input type="checkbox" name="category[]" value="all" {{ !request()->has('category') || in_array('all', request('category', [])) ? 'checked' : '' }} onchange="toggleCheckboxes(this, 'all')"> Visas kategorijas</label>
                        @foreach($categories as $category)
                            <label><input type="checkbox" name="category[]" value="{{ $category->id }}" {{ request()->has('category') && in_array($category->id, request('category', [])) ? 'checked' : '' }} onchange="toggleCheckboxes(this, '{{ $category->id }}')"> {{ $category->name }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" style="display: none;">Filtrēt</button>
        </form>
        <a href="{{ route('recipes.create') }}" class="add-recipe-btn">Pievienot</a>
    </nav>

    <div class="container">
        <h1 class="page-title">Manas receptes</h1>
        @if($recipes->isEmpty())
            <div class="no-recipes-container">
                <p class="no-recipes">Šajā kategorijā pagaidām vēl nav receptes</p>
            </div>
        @else
            <section class="recipe-grid">
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
                        <div class="edit-delete-buttons">
                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="edit-button">Rediģēt</a>
                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Vai tiešām vēlaties dzēst šo recepti?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="redirect" value="mine">
                                <button type="submit" class="delete-button">Dzēst</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </section>
        @endif
    </div>

    <footer>
        <p>
          &copy; <span id="info">2024 <br></span>
          <span class="footer-logo">TT2 eksāmena darbs - </span>
          <strong><i>"E-receptes" </i></strong><br>
          Autors: <ins>Marta Karīna Skrastiņa (ms23123) & Ivo Aļļēns (ia23031)</ins>
        </p>
    </footer>

    <script>
        function toggleSortOrder() {
            var orderInput = document.getElementById('order');
            orderInput.value = orderInput.value === 'asc' ? 'desc' : 'asc';
            document.getElementById('filter-form').submit();
        }

        function toggleCheckboxes(checkbox, value) {
            var checkboxes = document.querySelectorAll('.category-dropdown-content input[type="checkbox"]');
            if (value === 'all') {
                checkboxes.forEach(function(cb) {
                    cb.checked = checkbox.checked;
                });
            } else {
                if (checkbox.checked) {
                    checkboxes[0].checked = false; // Uncheck "all" if specific category is checked
                } else {
                    var anyChecked = Array.from(checkboxes).slice(1).some(function(cb) {
                        return cb.checked;
                    });
                    if (!anyChecked) {
                        checkboxes[0].checked = true; // Check "all" if no specific category is checked
                    }
                }
            }
            document.getElementById('filter-form').submit();
        }
    </script>
</body>
</html>





