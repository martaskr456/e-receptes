@extends('layouts.app')

@section('content')
<div class="container">
    <div class="profile-info">
        <p><strong>Vārds:</strong> {{ $user->name }}</p>
        <p><strong>E-pasts:</strong> {{ $user->email }}</p>
    </div>
</div>
@endsection

<style>
    /* Header and navigation styling */
    header {
        width: 100%;
        background-color: #ffffff;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        box-shadow: 0 4px 6px -6px #222;
        border-bottom: 4px solid #FF8C00;
        padding: 20px 0; 
    }

    /* Navigation styles */
    nav {
        width: 100%;
        background-color: #ffffff;
        position: fixed;
        top: 0;
        z-index: 1000;
        padding: 20px 0; 
        box-shadow: 0 4px 6px -6px #222;
        border-bottom: 4px solid #FF8C00;
        margin-bottom: 20px;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }

    nav ul li {
        margin-right: 20px;
        position: relative; 
    }

    nav ul li a {
        text-decoration: none;
        text-transform: uppercase;
        color: black;
        padding: 10px;
        transition: background-color 0.3s ease;
        font-size: 1.2em; 
    }

    nav ul li a:hover {
        background-color: #f1f1f1;
    }

    nav ul .brand {
        margin-left: 20px;
        flex-grow: 1;
        text-transform: none;
        font-weight: bold;
        font-size: x-large;
    }

    /* Dropdown styles */
    .dropdown {
        position: relative;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        width: 200px; 
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        color: #333;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Logout button styles */
    .logout-button {
        background-color: transparent;
        border: 2px solid #FF8C00;
        color: #FF8C00;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .logout-button:hover {
        background-color: #FF8C00;
        color: #fff;
    }

    .container {
        padding-top: 300px;
        padding-left: 500px
        }
    .profile-info {
        border: 1px solid #FF8C00;
        padding: 20px;
        border-radius: 10px;
        max-width: 500px;
        margin: 130px auto;
        background-color: #f9f9f9;

    }
    .profile-info p {
        font-size: 2em;
        margin-bottom: 10px;
    }
</style>
