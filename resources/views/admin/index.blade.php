@extends('layouts.app')

@section('content')
    <h1>Visas receptes</h1>
    <ul>
        @foreach ($recipes as $recipe)
            <li>{{ $recipe->title }} (<a href="{{ route('admin.destroy', $recipe->id) }}" onclick="event.preventDefault(); if(confirm('Vai esi pārliecināts, ka vēlies dzēst šo recepti?')) { document.getElementById('delete-recipe-form-{{ $recipe->id }}').submit(); }">Dzēst</a>)
                <form id="delete-recipe-form-{{ $recipe->id }}" action="{{ route('admin.destroy', $recipe->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </li>
        @endforeach
    </ul>
@endsection
