@extends('layouts.app')

@section('content')
<article>
    <h1>{{ $recipe->title }}</h1>
    <img src="{{ str_starts_with($recipe->image, 'images/') ? asset($recipe->image) : asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
    <div class="recipe-details">
        <div><strong>Gatavošanas laiks:</strong> {{ $recipe->cooking_time }} min</div>
        <div><strong>Sastāvdaļas:</strong> {!! nl2br(e($recipe->ingredients)) !!}</div>
        <div><strong>Norādījumi:</strong> {!! nl2br(e($recipe->instructions)) !!}</div>
    </div>
</article>
@endsection