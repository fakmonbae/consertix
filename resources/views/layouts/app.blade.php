<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white-100">


            <!-- Header Custom -->
            <header class="w-full bg-gradient-to-b from-[#0d0f55] to-[#0a0c38] text-white py-4">
                <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
                    <!-- LEFT: Menu -->
                    <nav class="flex items-center space-x-10 text-lg font-medium">
                        <a href="{{ url('/') }}" class="hover:text-indigo-300 transition">Home</a>
                        <a href="{{ route('concerts.index') }}" class="hover:text-indigo-300 transition">Concerts</a>
                        <a href="#" class="hover:text-indigo-300 transition">Singers</a>
                    </nav>
                    <!-- CENTER: Logo -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center space-x-2">
                        <a href="{{ Auth::check() ? route(Auth::user()->role . '.dashboard') : url('/') }}">
                            <img src="{{ asset('logo/header.png') }}" alt="logo" class="h-12">
                        </a>
                    </div>
                    <!-- RIGHT: Cart + Login + Register -->
                    <div class="flex items-center space-x-4">
                        <!-- Cart Icon -->
                        <button class="text-white hover:text-indigo-300 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 0L6.75 12.75h10.5l2.25-6.75H5.106m0 0l-.383-1.438M6.75 12.75L7.5 15.75h9l.75-3"/>
                            </svg>
                        </button>
                        @guest
                            <!-- Single Login/Register CTA -->
                            <a href="{{ route('login') }}" class="flex items-center space-x-2 bg-white text-indigo-700 px-4 py-2 rounded-full font-medium hover:bg-gray-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"/>
                                </svg>
                                <span class="text-sm">Login / Register</span>
                            </a>
                        @else
                            <!-- Jika user login: tampilkan dropdown dengan nama, history, dan logout -->
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <!-- Match guest CTA size/style: user name + icon in a pill -->
                                    <button class="flex items-center space-x-2 bg-white text-indigo-700 px-4 py-2 rounded-full font-medium hover:bg-gray-100 transition">
                                        <!-- user icon (same as guest) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"/>
                                        </svg>

                                        <span class="text-sm">{{ Auth::user()->name }}</span>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('history')">
                                        {{ __('History') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endguest
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
