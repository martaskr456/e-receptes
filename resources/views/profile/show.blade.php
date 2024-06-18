@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profils</h1>
    <div class="profile-info">
        <p><strong>Vārds:</strong> {{ $user->name }}</p>
        <p><strong>E-pasts:</strong> {{ $user->email }}</p>
        <!-- Pievienojiet citu informāciju pēc nepieciešamības -->
    </div>
</div>
@endsection

<style>
    .profile-info {
        border: 1px solid #FF8C00;
        padding: 20px;
        border-radius: 10px;
        max-width: 500px;
        margin: 0 auto;
        background-color: #f9f9f9;
    }
    .profile-info p {
        font-size: 1.2em;
        margin-bottom: 10px;
    }
</style>
