<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediģēt recepti</title>
    <link rel="stylesheet" href="{{ asset('css/styles_create.css') }}">
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>
    
    <div class="container">
        <h1 class="page-title">Rediģēt recepti</h1>
        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Nosaukums</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $recipe->title }}" required>
            </div>
            <div class="form-group">
                <label for="cooking_time">Pagatavošanas laiks (minūtēs)</label>
                <input type="number" class="form-control" id="cooking_time" name="cooking_time" value="{{ $recipe->cooking_time }}" required>
            </div>
            <div class="form-group">
                <label for="ingredients">Sastāvdaļas</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="5" required>{{ $recipe->ingredients }}</textarea>
            </div>
            <div class="form-group">
                <label for="instructions">Recepte</label>
                <textarea class="form-control" id="instructions" name="instructions" rows="10" required>{{ $recipe->instructions }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Augšupielādēt bildi</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                @if($recipe->image)
                    <p>Pašreizējā bilde:</p>
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="max-width: 100px;">
                @endif
            </div>
            <div class="form-group">
                <label for="category_id">Kategorija</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Izvēlieties kategoriju</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $recipe->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group form-check">
                <input type="radio" class="form-check-input" id="is_private" name="visibility" value="private" {{ $recipe->is_private ? 'checked' : '' }}>
                <label class="form-check-label" for="is_private">Privāta recepte</label>
                <br>
                <input type="radio" class="form-check-input" id="is_public" name="visibility" value="public" {{ !$recipe->is_private ? 'checked' : '' }}>
                <label class="form-check-label" for="is_public">Publiska recepte</label>
            </div>
            <button type="submit" class="btn">Atjaunināt recepti</button>
        </form>
    </div>

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

