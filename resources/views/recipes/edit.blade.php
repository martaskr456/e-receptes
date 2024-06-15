@extends('layouts.app')

@section('content')
    <h1>Rediģēt recepti</h1>
    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Nosaukums:</label>
        <input type="text" id="title" name="title" value="{{ $recipe->title }}" required><br><br>

        <label for="description">Apraksts:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required>{{ $recipe->description }}</textarea><br><br>

        <label for="category">Kategorija:</label>
        <input type="text" id="category" name="category" value="{{ $recipe->category }}" required><br><br>

        <label for="difficulty">Grūtības līmenis (1-5):</label>
        <input type="number" id="difficulty" name="difficulty" value="{{ $recipe->difficulty }}" min="1" max="5" required><br><br>

        <label for="preparation_time">Pagatavošanas laiks (minūtēs):</label>
        <input type="number" id="preparation_time" name="preparation_time" value="{{ $recipe->preparation_time }}" required><br><br>

        <label for="public">Publiska recepte:</label>
        <input type="checkbox" id="public" name="public" value="1" @if ($recipe->public) checked @endif><br><br>

        <button type="submit">Saglabāt izmaiņas</button>
    </form>
@endsection
