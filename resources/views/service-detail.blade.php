@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="text-center py-16 bg-white rounded-xl shadow-lg mb-12">
        @if($service->image)
            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="h-32 w-32 object-cover rounded-full mx-auto mb-6 border-4 border-blue-100">
        @endif
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-800 mb-4">{{ $service->name }}</h1>
        <p class="text-lg text-gray-700 max-w-2xl mx-auto mb-8">{{ $service->description }}</p>
        <a href="{{ route('services') }}" class="inline-block bg-blue-700 text-white px-6 py-2 rounded-full font-semibold shadow hover:bg-blue-800 transition">&larr; Back to Services</a>
    </section>
@endsection 