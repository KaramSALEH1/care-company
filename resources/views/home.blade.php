@extends('layouts.app')

@section('content')
<!-- Hero Section - Enhanced Version -->
<section class="relative bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl shadow-2xl overflow-hidden mb-16">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex flex-col items-center justify-center text-center">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="h-24 w-24 mb-6 bg-white rounded-full shadow-xl p-2">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-lg">
                Your Care is Our <span class="text-blue-200">Mission</span>
            </h1>
            <p class="text-xl lg:text-2xl text-blue-100 mb-8 max-w-3xl leading-relaxed">
                Your trusted partner for quality medical equipment and healthcare solutions
            </p>
            <a href="{{ route('services') }}" class="inline-block bg-white text-blue-700 font-bold px-8 py-4 rounded-xl shadow-lg hover:bg-blue-50 hover:scale-105 transition transform duration-300">
                Explore Our Products
            </a>
        </div>
    </div>
</section>

<!-- Features Section - Enhanced 3 Cards -->
<!-- Features Section - Enhanced 3 Cards -->
<section class="mb-16">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-blue-800 mb-4">Why Choose Us?</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">We provide comprehensive healthcare solutions with unmatched quality and service</p>
    </div>
    
    <div class="grid md:grid-cols-2 gap-8 mb-12 max-w-4xl mx-auto">
        <!-- About Us Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center hover:shadow-xl hover:scale-105 transition transform duration-300 border border-blue-50">
            <div class="bg-blue-100 rounded-2xl p-4 mb-6">
                <svg class="h-12 w-12 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V7H9V5.5L3 7V9L9 10.5V12L5 13V15L9 13.5V15H15V13.5L21 15V13L15 11.5V10.5L21 9Z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-blue-800 mb-4">About Us</h3>
            <p class="text-gray-600 mb-6 leading-relaxed">Learn more about our mission, values, and commitment to healthcare excellence.</p>
            <a href="{{ route('about') }}" class="text-blue-700 font-semibold hover:text-blue-800 hover:underline flex items-center">
                Read More
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Services Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center hover:shadow-xl hover:scale-105 transition transform duration-300 border border-blue-50">
            <div class="bg-blue-100 rounded-2xl p-4 mb-6">
                <svg class="h-12 w-12 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM7 7H9C9.6 7 10 7.4 10 8V16C10 16.6 9.6 17 9 17H7C6.4 17 6 16.6 6 16V8C6 7.4 6.4 7 7 7ZM17 7H15C14.4 7 14 7.4 14 8V16C14 16.6 14.4 17 15 17H17C17.6 17 18 16.6 18 16V8C18 7.4 17.6 7 17 7Z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-blue-800 mb-4">Our Products</h3>
            <p class="text-gray-600 mb-6 leading-relaxed">Discover our wide range of medical equipment and professional healthcare solutions.</p>
            <a href="{{ route('services') }}" class="text-blue-700 font-semibold hover:text-blue-800 hover:underline flex items-center">
                Explore Products
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<!-- <section class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
    <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-blue-50 hover:shadow-xl transition duration-300">
        <div class="text-4xl font-bold text-blue-700 mb-3">500+</div>
        <div class="text-gray-600 font-semibold">Medical Products</div>
    </div>
    <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-blue-50 hover:shadow-xl transition duration-300">
        <div class="text-4xl font-bold text-blue-700 mb-3">1000+</div>
        <div class="text-gray-600 font-semibold">Happy Clients</div>
    </div>
    <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-blue-50 hover:shadow-xl transition duration-300">
        <div class="text-4xl font-bold text-blue-700 mb-3">24/7</div>
        <div class="text-gray-600 font-semibold">Support</div>
    </div>
    <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-blue-50 hover:shadow-xl transition duration-300">
        <div class="text-4xl font-bold text-blue-700 mb-3">15+</div>
        <div class="text-gray-600 font-semibold">Years Experience</div>
    </div>
</section> -->

<!-- CTA Section -->
<!-- <section class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl shadow-2xl p-12 text-center mb-16">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Enhance Your Healthcare Services?</h2>
        <p class="text-xl text-blue-100 mb-8">Join thousands of healthcare professionals who trust us for their medical equipment needs.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('services') }}" class="bg-white text-blue-700 font-bold px-8 py-4 rounded-xl shadow-lg hover:bg-blue-50 hover:scale-105 transition transform duration-300">
                Browse Our Catalog
            </a>
            <a href="tel:+1234567890" class="border-2 border-white text-white font-bold px-8 py-4 rounded-xl hover:bg-white hover:text-blue-700 transition duration-300">
                Call Now: (123) 456-7890
            </a>
        </div>
    </div>
</section> -->

<!-- Additional Features Section -->
<section class="mb-16">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-blue-800 mb-4">Our Core Values</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Driven by excellence, committed to your health</p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-blue-50 rounded-2xl p-8 border border-blue-100 hover:border-blue-300 transition duration-300">
            <div class="bg-white rounded-xl p-3 inline-block mb-4 shadow-md">
                <svg class="h-8 w-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-blue-800 mb-3">Quality Assurance</h3>
            <p class="text-gray-600">Every product undergoes rigorous testing to meet international healthcare standards.</p>
        </div>

        <div class="bg-blue-50 rounded-2xl p-8 border border-blue-100 hover:border-blue-300 transition duration-300">
            <div class="bg-white rounded-xl p-3 inline-block mb-4 shadow-md">
                <svg class="h-8 w-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-blue-800 mb-3">Fast Delivery</h3>
            <p class="text-gray-600">Quick and reliable shipping to ensure you get equipment when you need it most.</p>
        </div>

        <div class="bg-blue-50 rounded-2xl p-8 border border-blue-100 hover:border-blue-300 transition duration-300">
            <div class="bg-white rounded-xl p-3 inline-block mb-4 shadow-md">
                <svg class="h-8 w-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-blue-800 mb-3">24/7 Support</h3>
            <p class="text-gray-600">Round-the-clock customer service and technical support for all your needs.</p>
        </div>
    </div>
</section>
@endsection