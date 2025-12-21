@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-extrabold text-blue-800 mb-6 text-center">Our Products</h1>
    <div class="w-full px-8 mb-8">
        <div class="flex flex-wrap gap-3 justify-center">
            <a href="{{ route('services') }}" class="px-4 py-2 rounded-full border {{ empty($activeCategory) ? 'bg-blue-700 text-black border-blue-700' : 'bg-white text-blue-700 border-blue-300' }}">All</a>
            @foreach($allCategories as $category)
                <a href="{{ route('services', ['category' => $category->slug]) }}" class="px-4 py-2 rounded-full border {{ $activeCategory === $category->slug ? 'bg-blue-700 text-black border-blue-700' : 'bg-white text-blue-700 border-blue-300' }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
    <div class="space-y-12 w-full px-8">
        @foreach($categories as $category)
            @if($category->services->count())
                <div>
                    <h2 class="text-2xl font-bold text-blue-900 mb-6">{{ $category->name }}</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        @foreach($category->services as $service)
                            <div class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center hover:shadow-xl transition group">
                                @if($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="h-24 w-24 object-cover rounded-full mb-4 border-4 border-blue-100 group-hover:border-blue-400 transition">
                                @else
                                    <div class="h-24 w-24 mb-4 rounded-full bg-blue-100 flex items-center justify-center text-blue-400 text-3xl font-bold">{{ strtoupper(substr($service->name,0,1)) }}</div>
                                @endif
                                <h3 class="text-xl font-bold text-blue-800 mb-2">{{ $service->name }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($service->description, 80) }}</p>
                                <a href="{{ route('services.detail', $service->slug) }}" class="inline-block bg-blue-700 text-white px-5 py-2 rounded-full font-semibold shadow hover:bg-blue-800 transition">Learn More</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        @if($uncategorizedServices->count())
            <div>
                <h2 class="text-2xl font-bold text-blue-900 mb-6">Uncategorized</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($uncategorizedServices as $service)
                        <div class="bg-white rounded-xl shadow-md p-8 flex flex-col items-center hover:shadow-xl transition group">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="h-24 w-24 object-cover rounded-full mb-4 border-4 border-blue-100 group-hover:border-blue-400 transition">
                            @else
                                <div class="h-24 w-24 mb-4 rounded-full bg-blue-100 flex items-center justify-center text-blue-400 text-3xl font-bold">{{ strtoupper(substr($service->name,0,1)) }}</div>
                            @endif
                            <h3 class="text-xl font-bold text-blue-800 mb-2">{{ $service->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($service->description, 80) }}</p>
                            <a href="{{ route('services.detail', $service->slug) }}" class="inline-block bg-blue-700 text-white px-5 py-2 rounded-full font-semibold shadow hover:bg-blue-800 transition">Learn More</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection 