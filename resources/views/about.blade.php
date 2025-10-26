@extends('layouts.app')

@section('content')
    <section class="max-w-6xl mx-auto bg-white rounded-2xl shadow-xl p-10 text-center mb-12">
        <h1 class="text-4xl font-extrabold text-blue-800 mb-6">About Us</h1>
        <p class="text-lg text-gray-700 mb-4 leading-relaxed">We are a leading provider of medical equipment, committed to delivering quality products and exceptional service to healthcare professionals and institutions.</p>
        <p class="text-gray-600 text-lg">Our mission is to improve healthcare outcomes by supplying reliable and innovative medical solutions.</p>
    </section>

    <section class="max-w-7xl mx-auto mb-16">
        <div class="grid md:grid-cols-3 gap-8">
            
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-lg p-8 border border-blue-100 hover:shadow-xl transition duration-300">
                <div class="text-center mb-8">
                    <div class="bg-blue-100 rounded-2xl p-4 inline-flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1L3 5V11C3 16.55 6.84 21.74 12 23C17.16 21.74 21 16.55 21 11V5L12 1ZM12 7C13.66 7 15 8.34 15 10C15 11.66 13.66 13 12 13C10.34 13 9 11.66 9 10C9 8.34 10.34 7 12 7ZM18 10C18 12.21 16.21 14 14 14H10C7.79 14 6 12.21 6 10V6.3L12 3.19L18 6.3V10Z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-blue-800 mb-2">Exclusive Agents</h2>
                    <p class="text-gray-600">Trusted Partners with Exclusive Rights</p>
                </div>
                
                <div class="space-y-4">
                    @php
                        $exclusiveAgents = [
                            ['name' => 'Dimas', 'logo' => 'dimas-logo.png'],
                            ['name' => 'Arwan', 'logo' => 'arwan-logo.png'],
                            ['name' => 'Orzax', 'logo' => 'orzax-logo.png'],
                        ];
                    @endphp
                    
                    @foreach($exclusiveAgents as $agent)
                    <div class="flex items-center justify-between bg-white rounded-xl p-4 shadow-sm border border-blue-50 hover:border-blue-200 transition duration-200">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-50 rounded-lg p-2">
                                <img src="{{ asset('storage/logos/' . $agent['logo']) }}" alt="{{ $agent['name'] }}" class="h-8 w-8 object-contain">
                            </div>
                            <span class="font-semibold text-gray-800 text-lg">{{ $agent['name'] }}</span>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">Exclusive</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-lg p-8 border border-blue-100 hover:shadow-xl transition duration-300">
                <div class="text-center mb-8">
                    <div class="bg-blue-100 rounded-2xl p-4 inline-flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 5.5V7H9V5.5L3 7V9L9 10.5V12L5 13V15L9 13.5V15H15V13.5L21 15V13L15 11.5V10.5L21 9Z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-blue-800 mb-2">Certified Distributors</h2>
                    <p class="text-gray-600">Authorized Distribution Partners</p>
                </div>
                
                <div class="space-y-4">
                    @php
                        $certifiedDistributors = [
                            ['name' => 'Hipta Plus', 'logo' => 'hipta-logo.png'],
                            ['name' => 'Obri Haboush', 'logo' => 'obri-logo.png'],
                            ['name' => 'MIS', 'logo' => 'mis-logo.png'],
                        ];
                    @endphp
                    
                    @foreach($certifiedDistributors as $distributor)
                    <div class="flex items-center justify-between bg-white rounded-xl p-4 shadow-sm border border-blue-50 hover:border-blue-200 transition duration-200">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-50 rounded-lg p-2">
                                <img src="{{ asset('storage/logos/' . $distributor['logo']) }}" alt="{{ $distributor['name'] }}" class="h-8 w-8 object-contain">
                            </div>
                            <span class="font-semibold text-gray-800 text-lg">{{ $distributor['name'] }}</span>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">Certified</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-lg p-8 border border-blue-100 hover:shadow-xl transition duration-300">
                <div class="text-center mb-8">
                    <div class="bg-blue-100 rounded-2xl p-4 inline-flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM7 7H9C9.6 9 10 9.4 10 10V16C10 16.6 9.6 17 9 17H7C6.4 17 6 16.6 6 16V8C6 7.4 6.4 7 7 7ZM17 7H15C14.4 7 14 7.4 14 8V16C14 16.6 14.4 17 15 17H17C17.6 17 18 16.6 18 16V8C18 7.4 17.6 7 17 7Z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-blue-800 mb-2">General Suppliers</h2>
                    <p class="text-gray-600">Reliable Supply Chain Partners</p>
                </div>
                
                <div class="space-y-4">
                    @php
                        $generalSuppliers = [
                            ['name' => 'Ibn Hayan', 'logo' => 'ibn-hayan-logo.png'],
                            ['name' => 'Ibn Zahr', 'logo' => 'ibn-zahr-logo.png'],
                        ];
                    @endphp
                    
                    @foreach($generalSuppliers as $supplier)
                    <div class="flex items-center justify-between bg-white rounded-xl p-4 shadow-sm border border-blue-50 hover:border-blue-200 transition duration-200">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-50 rounded-lg p-2">
                                <img src="{{ asset('storage/logos/' . $supplier['logo']) }}" alt="{{ $supplier['name'] }}" class="h-8 w-8 object-contain">
                            </div>
                            <span class="font-semibold text-gray-800 text-lg">{{ $supplier['name'] }}</span>
                        </div>
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded-full">General</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-10 mb-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-blue-800 mb-4">Additional Medical Products</h2>
            <p class="text-xl text-gray-600">We provide a wide range of specialized medical products</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-br from-green-50 to-white rounded-xl p-6 border border-green-100">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="bg-green-100 rounded-lg p-2">
                        <svg class="h-6 w-6 text-green-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-green-800">Specialty Hospital Medicines</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    We offer a wide range of specialized medicines for hospitals and medical clinics, 
                    ensuring quality and effectiveness in all products.
                </p>
            </div>

            <div class="bg-gradient-to-br from-orange-50 to-white rounded-xl p-6 border border-orange-100">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="bg-orange-100 rounded-lg p-2">
                        <svg class="h-6 w-6 text-orange-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17,10H13V6H11V10H7V12H11V16H13V12H17V10Z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-orange-800">IV Nutrition Serums</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    We provide various types of intravenous nutrition solutions and medical serums 
                    with high-quality specifications that meet advanced healthcare needs.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-4xl mx-auto bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl shadow-2xl p-12 text-center text-white">
        <h2 class="text-3xl font-bold mb-6">Partners in Healthcare</h2>
        <p class="text-xl text-blue-100 mb-6 leading-relaxed">
            We work with the best international and local companies to provide the latest medical solutions 
            and highest quality pharmaceutical products to ensure comprehensive healthcare.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('services') }}" class="bg-white text-blue-700 font-bold px-8 py-3 rounded-xl shadow-lg hover:bg-blue-50 transition duration-300">
                Browse Our Products
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white font-bold px-8 py-3 rounded-xl hover:bg-white hover:text-blue-700 transition duration-300">
                Contact Us
            </a>
        </div>
    </section>
@endsection