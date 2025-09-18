<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Medical Equipment Center') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gray-50 font-sans">
    <header class="sticky top-0 z-30 bg-white shadow-md border-b border-blue-100 w-full">
        <div class="flex items-center justify-between py-4 px-6 w-full">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <img src="/favicon.ico" alt="Logo" class="h-8 w-8">
                <span class="font-bold text-xl text-blue-700">Medical Equipment Center</span>
            </a>
            <nav class="space-x-6 text-lg">
                <a href="{{ route('home') }}" class="pb-1 border-b-2 {{ request()->routeIs('home') ? 'border-blue-600 text-blue-700 font-semibold' : 'border-transparent hover:border-blue-300 hover:text-blue-600' }} transition">Home</a>
                <a href="{{ route('about') }}" class="pb-1 border-b-2 {{ request()->routeIs('about') ? 'border-blue-600 text-blue-700 font-semibold' : 'border-transparent hover:border-blue-300 hover:text-blue-600' }} transition">About Us</a>
                <a href="{{ route('services') }}" class="pb-1 border-b-2 {{ request()->routeIs('services') ? 'border-blue-600 text-blue-700 font-semibold' : 'border-transparent hover:border-blue-300 hover:text-blue-600' }} transition">Services</a>
                <a href="{{ route('contact') }}" class="pb-1 border-b-2 {{ request()->routeIs('contact') ? 'border-blue-600 text-blue-700 font-semibold' : 'border-transparent hover:border-blue-300 hover:text-blue-600' }} transition">Contact Us</a>
                @auth
                    <a href="{{ route('admin.services.index') }}" class="pb-1 border-b-2 {{ request()->is('admin/services*') ? 'border-blue-600 text-blue-700 font-semibold' : 'border-transparent hover:border-blue-300 hover:text-blue-600' }} transition">Admin</a>
                @endauth
            </nav>
            <div>
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="ml-4 text-blue-700 hover:underline font-semibold">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="ml-4 text-blue-700 hover:underline font-semibold">Login</a>
                @endauth
            </div>
        </div>
    </header>
    <main class="flex-1 w-full px-0 py-10">
        @yield('content')
    </main>
    <footer class="bg-blue-800 text-white py-6 mt-8 shadow-inner w-full">
        <div class="flex flex-col md:flex-row justify-between items-center px-6 w-full">
            <div class="mb-2 md:mb-0">
                <span class="font-bold">&copy; {{ date('Y') }} Medical Equipment Center.</span> All rights reserved.
            </div>
            <div class="space-x-4">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <a href="{{ route('about') }}" class="hover:underline">About</a>
                <a href="{{ route('services') }}" class="hover:underline">Services</a>
                <a href="{{ route('contact') }}" class="hover:underline">Contact</a>
            </div>
        </div>
    </footer>
    @stack('scripts')
</body>
</html>
