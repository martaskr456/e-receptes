<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Website</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-white font-bold">Home</a>
                <div>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-center">Welcome to Our Website</h1>
        <p class="text-center mt-4">Here you can find delicious recipes and more.</p>
    </div>
</body>
</html>
