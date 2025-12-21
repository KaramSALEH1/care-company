<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Medical Equipment Center') }}</title>
    
    <!-- Tailwind CSS CDN as fallback -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        blue: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Your Vite build (will be used when npm works) -->
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gray-50 font-sans antialiased">
    <header class="sticky top-0 z-50 bg-white shadow-lg border-b border-blue-200 w-full">
        <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-6 w-full">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 hover:scale-105 transition-transform duration-200">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-20 w-20 bg-white rounded-full shadow-md p-1">
                <span class="font-bold text-2xl bg-gradient-to-r from-blue-700 to-blue-600 bg-clip-text text-transparent">Care Company<span class="text-blue-500"></span></span>
            </a>
            
            <!-- Mobile menu button (hidden on desktop) -->
            <button class="md:hidden p-2 rounded-lg hover:bg-blue-50 transition-colors">
                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

        <!-- Desktop Navigation -->
<nav class="hidden md:flex space-x-8 text-lg ml-auto">
    <a href="{{ route('home') }}" class="pb-1 border-b-2 font-medium {{ request()->routeIs('home') ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-600 hover:border-blue-400 hover:text-blue-600' }} transition-all duration-300">Home</a>
    <a href="{{ route('about') }}" class="pb-1 border-b-2 font-medium {{ request()->routeIs('about') ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-600 hover:border-blue-400 hover:text-blue-600' }} transition-all duration-300">About Us</a>
    <a href="{{ route('services') }}" class="pb-1 border-b-2 font-medium {{ request()->routeIs('services') ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-600 hover:border-blue-400 hover:text-blue-600' }} transition-all duration-300">Products</a>
    <!-- <a href="{{ route('contact') }}" class="pb-1 border-b-2 font-medium {{ request()->routeIs('contact') ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-600 hover:border-blue-400 hover:text-blue-600' }} transition-all duration-300">Contact Us</a> -->
    @auth
        <a href="{{ route('admin.services.index') }}" class="pb-1 border-b-2 font-medium {{ request()->is('admin/services*') ? 'border-blue-600 text-blue-700' : 'border-transparent text-gray-600 hover:border-blue-400 hover:text-blue-600' }} transition-all duration-300">Admin</a>
    @endauth
</nav>

            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg">
                            Logout
                        </button>
                    </form>
                @else
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-1 w-full px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gradient-to-r from-blue-800 to-blue-900 text-white py-4 mt-16 shadow-2xl w-full">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-12 bg-white rounded-full shadow-lg p-1">
                        <span class="font-bold text-2xl text-white">Care Company<span class="text-blue-300"></span></span>
                    </div>
                    <p class="text-blue-200 leading-relaxed">
                        Your trusted partner for quality medical equipment and healthcare solutions. 
                        Delivering excellence in patient care since 2010.
                    </p>
                </div>
                
                <div class="md:text-center">
                    <h3 class="font-bold text-lg mb-4 text-white">Quick Links</h3>
                    <div class="space-y-2">
                        <a href="{{ route('home') }}" class="block text-blue-200 hover:text-white hover:underline transition-colors">Home</a>
                        <a href="{{ route('about') }}" class="block text-blue-200 hover:text-white hover:underline transition-colors">About Us</a>
                        <a href="{{ route('services') }}" class="block text-blue-200 hover:text-white hover:underline transition-colors">Products</a>
                        <!-- <a href="{{ route('contact') }}" class="block text-blue-200 hover:text-white hover:underline transition-colors">Contact</a> -->
                    </div>
                </div>
                
                <div class="md:text-right">
                    <h3 class="font-bold text-lg mb-4 text-white">Contact Info</h3>
                    <div class="space-y-2 text-blue-200">
                        <p class="flex items-center justify-end space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>123 Medical Ave, Healthcare City</span>
                        </p>
                        <p class="flex items-center justify-end space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>(123) 456-7890</span>
                        </p>
                        <p class="flex items-center justify-end space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>info@medicalequipment.com</span>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-blue-700 pt-8 text-center">
                <span class="text-blue-300">&copy; {{ date('Y') }} Medical Equipment Center. All rights reserved.</span>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>