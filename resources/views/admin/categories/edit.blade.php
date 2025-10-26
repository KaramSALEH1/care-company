@extends('layouts.app')

@section('content')
    <section class="bg-white rounded-xl shadow-lg p-8 w-full max-w-2xl mx-auto">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            
            <div class="space-y-5">
                <div>
                    <label class="block mb-2 font-medium text-gray-700" for="name">Category Name</label>
                    <input class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                           type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required placeholder="Enter category name">
                    @error('name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                </div>
                
                <div>
                    <label class="block mb-2 font-medium text-gray-700" for="slug">URL Slug</label>
                    <input class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                           type="text" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required placeholder="auto-generated-slug">
                    @error('slug')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                </div>
                
                <div>
                    <label class="block mb-2 font-medium text-gray-700" for="image">Category Image</label>
                    
                    <!-- Current Image -->
                    @if($category->image)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="h-20 rounded-lg shadow border">
                        </div>
                    @endif
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-400 transition-colors">
                        <input class="hidden" type="file" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                        <label for="image" class="cursor-pointer">
                            <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-sm text-gray-600">Click to upload new image</span>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG, JPEG up to 2MB</p>
                        </label>
                    </div>
                    @error('image')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                    
                    <!-- New Image Preview -->
                    <div id="imagePreview" class="mt-4 text-center hidden">
                        <p class="text-sm text-gray-600 mb-2">New Image Preview:</p>
                        <img id="preview" class="h-20 mx-auto rounded-lg shadow">
                    </div>
                </div>
            </div>
            
            <div class="flex space-x-4 pt-4">
                <a href="{{ route('admin.categories.index') }}" class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium text-center hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm">
                    Update Category
                </button>
            </div>
        </form>
    </section>
@endsection

@push('scripts')
<script>
    // Image preview function
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            previewContainer.classList.add('hidden');
        }
    }
</script>
@endpush