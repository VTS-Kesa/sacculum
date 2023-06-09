<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-800">
        <header class="bg-gray-900 flex justify-between items-center flex-col md:flex-row">
            <div class="container mx-auto px-4 pb-0 py-6 md:pb-6">
                <a href="/">
                    <h1 class="text-4xl font-bold text-white">Sacculum</h1>
                </a>
            </div>
            <div class="container mx-auto px-4 py-6 text-left md:text-right flex flex-col justify-end gap-3 md:flex-row">
                @auth
                    <a href="{{ route('profile') }}" class="text-white">Profile</a>
                    @if (auth()->user()->role->slug === 'admin')
                        <a href="{{ route('users') }}" class="text-white">Users</a>
                        <a href="{{ route('categories') }}" class="text-white">Categories</a>
                        <a href="{{ route('ingredients') }}" class="text-white">Ingredients</a>
                    @endif
                    <a href="{{ route('recipes') }}" class="text-white">Recipes</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="text-white" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white">Login</a>
                    <a href="{{ route('register') }}" class="text-white">Register</a>
                @endauth
            </div>
        </header>

        <!-- Render the message if there is one -->
        @if(session('message'))
            <div class="container mx-auto px-4 py-6">
                <div class="bg-green-500 p-4 rounded-lg text-white text-center">
                    {{ session('message') }}
                </div>
            </div>
        @endif
        <!-- Render the error if there are any -->
        @if(session('error'))
            <div class="container mx-auto px-4 py-6">
                <div class="bg-red-500 p-4 rounded-lg text-white text-center">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <main class="py-4 text-white">
            @yield('content')
        </main>
</body>
</html>
