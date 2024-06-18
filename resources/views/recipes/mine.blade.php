@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manas Receptes</h1>
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
                <div class="edit-delete-buttons">
                    <a href="{{ route('recipes.edit', $recipe->id) }}">Rediģēt</a>
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Vai tiešām vēlaties dzēst šo recepti?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Dzēst</button>
                    </form>
                </div>
            </article>
        @endforeach
    </section>
</div>
@endsection

<style>
    /* Include your styles here */
</style>
