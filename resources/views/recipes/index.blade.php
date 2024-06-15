@extends('layouts.app')

@section('content')
    <h1>Publiskās receptes</h1>
    <ul>
        @foreach ($recipes as $recipe)
            <li>{{ $recipe->title }}</li>
        @endforeach
    </ul>
@endsection
