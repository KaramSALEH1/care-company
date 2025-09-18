<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('admin.categories.index') }}" class="inline-block bg-green-600 text-white px-6 py-2 rounded-full font-semibold shadow hover:bg-green-700 transition">Manage Categories</a>
                        <a href="{{ route('admin.products.index') }}" class="inline-block bg-blue-700 text-white px-6 py-2 rounded-full font-semibold shadow hover:bg-blue-800 transition">Manage Products</a>
                        <a href="{{ route('admin.services.index') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-full font-semibold shadow hover:bg-indigo-700 transition">Manage Services</a>
                        <a href="{{ route('admin.services.create') }}" class="inline-block bg-blue-100 text-blue-800 px-6 py-2 rounded-full font-semibold shadow hover:bg-blue-200 transition">Add Service</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
