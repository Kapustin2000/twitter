<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


    <style>
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div id="app">
    <section class="px-8 py-4 mb-6">
        <header class="container mx-auto">
            <h1>
                <a href="/">
                    <img
                            src="/images/logo.svg"
                            alt="Tweety"
                    >
                </a>
            </h1>
                @guest
                <div class="top-right links">
                        <a href="{{ route('login') }}">Login</a>
                       <a href="{{ route('register') }}">Register</a>
                </div>
                @endguest
        </header>
    </section>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-center">
                @auth
                <div class="lg:w-32">
                    <ul>
                        <li>
                            <a class="font-bold text-lg mb-4 block" href="/">
                                Home
                            </a>
                        </li>

                        <li>
                            <a class="font-bold text-lg mb-4 block" href="/explore">
                                Explore
                            </a>
                        </li>

                        <li>
                            <a class="font-bold text-lg mb-4 block" href="/profile/{{Auth::user()->username}}">
                                Profile
                            </a>
                        </li>

                        <li>
                            <form method="POST" action="/logout">
                                @csrf

                                <button class="font-bold text-lg">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth

                <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
                    @yield('content')
                </div>

                @auth
                <div class="lg:w-1/6">
                    <x-friends-sidebar></x-friends-sidebar>
                </div>
                @endauth
            </div>
        </main>
    </section>
</div>

</body>
</html>