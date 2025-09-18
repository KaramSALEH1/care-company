@extends('layouts.app')

@section('content')
    <section class="bg-white rounded-none shadow-lg p-10 w-full">
        <h1 class="text-3xl font-extrabold text-blue-800 mb-6">Add New Category</h1>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-1 font-semibold text-blue-700" for="name">Name</label>
                <input class="w-full border border-blue-200 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition text-black placeholder-gray-500" type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-1 font-semibold text-blue-700" for="slug">Slug</label>
                <input class="w-full border border-blue-200 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition text-black placeholder-gray-500" type="text" id="slug" name="slug" value="{{ old('slug') }}" required>
                @error('slug')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="w-full bg-blue-700 text-black px-6 py-2 rounded-full font-semibold shadow hover:bg-blue-800 transition">Create Category</button>
            <a href="{{ route('admin.categories.index') }}" class="w-full block text-center text-gray-600 hover:underline mt-2">Cancel</a>
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
    })();
</script>
@endpush


