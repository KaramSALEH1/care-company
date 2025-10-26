@extends('layouts.app')

@section('content')
    <section class="bg-white rounded-xl shadow-lg p-8 w-full max-w-2xl mx-auto">
        <!-- <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Add New Product</h1>
            <p class="text-gray-600">Create a new product for your catalog</p>
        </div> -->
        
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-5">
                    <div>
                        <label class="block mb-2 font-medium text-gray-700" for="name">Product Name</label>
                        <input class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                               type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter product name">
                        @error('name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                    </div>
                    
                    <div>
                        <label class="block mb-2 font-medium text-gray-700" for="category_id">Category</label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                id="category_id" name="category_id">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                    </div>
                    
                    <div>
                        <label class="block mb-2 font-medium text-gray-700" for="slug">URL Slug</label>
                        <input class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                               type="text" id="slug" name="slug" value="{{ old('slug') }}" required placeholder="auto-generated-slug">
                        @error('slug')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="space-y-5">
                    <div>
                        <label class="block mb-2 font-medium text-gray-700" for="image">Product Image</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-400 transition-colors">
                            <input class="hidden" type="file" id="image" name="image" onchange="previewImage(this)">
                            <label for="image" class="cursor-pointer">
                                <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Click to upload image</span>
                            </label>
                        </div>
                        @error('image')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
            
            <div>
                <label class="block mb-2 font-medium text-gray-700" for="description">Description</label>
                <textarea class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                          id="description" name="description" rows="3" placeholder="Enter product description..." required>{{ old('description') }}</textarea>
                @error('description')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            
            <div class="flex space-x-4 pt-4">
                <a href="{{ route('admin.services.index') }}" class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium text-center hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm">
                    Create Product
                </button>
            </div>
        </form>
    </section>
@endsection 

@push('scripts')
<script>
    (function() {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        if (!nameInput || !slugInput) return;

        let slugManuallyEdited = false;
        slugInput.addEventListener('input', function() { slugManuallyEdited = true; });

        function slugify(value) {
            return value
                .toString()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        nameInput.addEventListener('input', function() {
            if (slugManuallyEdited && slugInput.value.length > 0) return;
            slugInput.value = slugify(nameInput.value);
        });

        // Image preview function
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Create or update preview
                    let preview = input.parentNode.querySelector('.image-preview');
                    if (!preview) {
                        preview = document.createElement('div');
                        preview.className = 'mt-3 text-center image-preview';
                        input.parentNode.appendChild(preview);
                    }
                    preview.innerHTML = `
                        <p class="text-sm text-gray-600 mb-2">Image Preview:</p>
                        <img src="${e.target.result}" alt="Preview" class="h-20 mx-auto rounded-lg shadow">
                    `;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    })();
</script>
@endpush