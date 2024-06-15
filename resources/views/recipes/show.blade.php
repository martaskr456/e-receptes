@extends('layouts.app')

@section('content')
    <h1>{{ $recipe->title }}</h1>
    <p><strong>Autors:</strong> {{ $recipe->user->name }}</p>
    <p><strong>Kategorija:</strong> {{ $recipe->category }}</p>
    <p><strong>Grūtības līmenis:</strong> {{ $recipe->difficulty }}</p>
    <p><strong>Pagatavošanas laiks:</strong> {{ $recipe->preparation_time }} minūtes</p>
    <p><strong>Apraksts:</strong><br>{{ $recipe->description }}</p>
    
    @if (auth()->check() && auth()->id() == $recipe->user_id)
        <a href="{{ route('recipes.edit', $recipe->id) }}">Rediģēt</a>
        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Dzēst</button>
        </form>
    @endif
@endsection
