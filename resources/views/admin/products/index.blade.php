@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-extrabold text-blue-800 mb-8">Manage Products</h1>
    <div class="flex flex-wrap gap-3 mb-6">
        <a href="{{ route('admin.products.create') }}" class="bg-blue-700 text-white px-6 py-2 rounded-full font-semibold shadow hover:bg-blue-800 transition inline-block">Add New Product</a>
        <a href="{{ route('admin.categories.index') }}" class="bg-green-600 text-white px-6 py-2 rounded-full font-semibold shadow hover:bg-green-700 transition inline-block">Manage Categories</a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto w-full px-8">
        <table class="min-w-full bg-white rounded-xl shadow-md">
            <thead class="bg-blue-50">
                <tr>
                    <th class="py-3 px-6 text-left font-bold text-blue-700">Name</th>
                    <th class="py-3 px-6 text-left font-bold text-blue-700">Slug</th>
                    <th class="py-3 px-6 text-left font-bold text-blue-700">Category</th>
                    <th class="py-3 px-6 text-left font-bold text-blue-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="border-b hover:bg-blue-50 transition">
                        <td class="py-3 px-6">{{ $product->name }}</td>
                        <td class="py-3 px-6">{{ $product->slug }}</td>
                        <td class="py-3 px-6">{{ optional($product->category)->name ?? '—' }}</td>
                        <td class="py-3 px-6">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-700 font-semibold hover:underline mr-4">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 