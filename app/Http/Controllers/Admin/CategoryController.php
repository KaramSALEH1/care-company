<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // Debug: Log request details
        Log::info('Category store request received', [
            'has_file' => $request->hasFile('image'),
            'file_name' => $request->hasFile('image') ? $request->file('image')->getClientOriginalName() : null,
            'file_size' => $request->hasFile('image') ? $request->file('image')->getSize() : null,
            'file_mime' => $request->hasFile('image') ? $request->file('image')->getMimeType() : null,
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,heic,heif|max:5120',
        ], [
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif, webp, heic, or heif.',
            'image.max' => 'The image may not be greater than 5MB.',
        ]);

        Log::info('Validation passed', ['validated' => array_keys($validated)]);

        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                Log::info('Processing image upload', [
                    'original_name' => $image->getClientOriginalName(),
                    'mime_type' => $image->getMimeType(),
                    'size' => $image->getSize(),
                ]);
                
                // Ensure the directory exists
                $directory = storage_path('app/public/categories');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                    Log::info('Created directory: ' . $directory);
                }
                
                $imagePath = $image->store('categories', 'public');
                Log::info('Image stored successfully', ['path' => $imagePath]);
                $validated['image'] = $imagePath;
            } catch (\Exception $e) {
                Log::error('Image upload failed', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()]);
            }
        } else {
            Log::info('No image file in request');
        }

        Category::create($validated);
        Log::info('Category created successfully');
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,heic,heif|max:5120',
        ], [
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif, webp, heic, or heif.',
            'image.max' => 'The image may not be greater than 5MB.',
        ]);

        if ($request->hasFile('image')) {
            try {
                // Delete old image if exists
                if ($category->image) {
                    Storage::disk('public')->delete($category->image);
                }
                
                $image = $request->file('image');
                
                // Ensure the directory exists
                $directory = storage_path('app/public/categories');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                
                $validated['image'] = $image->store('categories', 'public');
            } catch (\Exception $e) {
                Log::error('Image upload failed: ' . $e->getMessage());
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'Failed to upload image. Please try again or use a different image format.']);
            }
        }

        $category->update($validated);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}


