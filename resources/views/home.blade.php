@extends('layouts.app')

@section('content')
    <section class="relative bg-blue-700 rounded-xl shadow-lg overflow-hidden mb-12">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" alt="Medical Equipment" class="absolute inset-0 w-full h-full object-cover opacity-40">
        <div class="relative z-10 flex flex-col items-center justify-center py-20 px-4 text-center">
            <img src="/favicon.ico" alt="Logo" class="h-24 w-24 mb-4 bg-white rounded-full shadow-lg p-2">
            <h1 class="text-5xl font-extrabold text-white mb-4 drop-shadow">Welcome to <span class="text-blue-200">Medical Equipment Center</span></h1>
            <p class="text-xl text-blue-100 mb-6">Your trusted partner for quality medical equipment</p>
            <a href="{{ route('services') }}" class="inline-block bg-white text-blue-700 font-bold px-8 py-3 rounded-full shadow-lg hover:bg-blue-100 transition">Explore Our Services</a>
        </div>
    </section>
    <section class="grid md:grid-cols-3 gap-8 mb-12">
        <div class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center hover:shadow-xl transition">
            <div class="bg-blue-100 rounded-full p-4 mb-4">
                <svg class="h-8 w-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 11c0-3.866-3.134-7-7-7m14 0c-3.866 0-7 3.134-7 7m0 0c0 3.866 3.134 7 7 7m-14 0c3.866 0 7-3.134 7-7"/></svg>
            </div>
            <h2 class="text-xl font-bold text-blue-800 mb-2">About Us</h2>
            <p class="text-gray-600 mb-4">Learn more about our mission and values.</p>
            <a href="{{ route('about') }}" class="text-blue-700 font-semibold hover:underline">Read More</a>
        </div>
        <div class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center hover:shadow-xl transition">
            <div class="bg-blue-100 rounded-full p-4 mb-4">
                <svg class="h-8 w-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-2a4 4 0 0 1 8 0v2m-4-4V7a4 4 0 1 1 8 0v6"/></svg>
            </div>
            <h2 class="text-xl font-bold text-blue-800 mb-2">Our Services</h2>
            <p class="text-gray-600 mb-4">Explore our top medical equipment services.</p>
            <a href="{{ route('services') }}" class="text-blue-700 font-semibold hover:underline">View Services</a>
        </div>
        <div class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center hover:shadow-xl transition">
            <div class="bg-blue-100 rounded-full p-4 mb-4">
                <svg class="h-8 w-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
            </div>
            <h2 class="text-xl font-bold text-blue-800 mb-2">Contact Us</h2>
            <p class="text-gray-600 mb-4">Get in touch for inquiries or support.</p>
            <a href="{{ route('contact') }}" class="text-blue-700 font-semibold hover:underline">Contact</a>
        </div>
    </section>
@endsection 