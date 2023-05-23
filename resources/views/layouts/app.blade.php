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
        <header class="bg-gray-900 flex justify-between items-center">
            <div class="container mx-auto px-4 py-6">
                <a href="/">
                    <h1 class="text-2xl md:text-4xl font-bold text-white">Sacculum</h1>
                </a>
            </div>
            <div class="container mx-auto px-4 py-6 text-right flex justify-end gap-3">
                @auth
                    <a href="{{ route('home') }}" class="text-white">Dashboard</a>
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


        <main class="py-4 text-white">
            @yield('content')
        </main>
</body>
</html>