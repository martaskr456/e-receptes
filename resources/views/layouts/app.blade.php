<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-receptes</title>
    <style>
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        <nav class="bg-gray-800 text-white p-4 flex justify-between items-center">
            <div>
                <a href="{{ route('home') }}" class="text-xl font-bold">e-receptes</a>
            </div>
            <div>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'font-bold' : '' }} mr-4">Home</a>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'font-bold' : '' }} mr-4">Dashboard</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'font-bold' : '' }} mr-4">Par</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'font-bold' : '' }}">Kontakti</a>
            </div>
        </nav>
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>


