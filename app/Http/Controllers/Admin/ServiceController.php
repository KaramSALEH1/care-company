<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Debug: Log request details
        Log::info('Service store request received', [
            'has_file' => $request->hasFile('image'),
            'file_name' => $request->hasFile('image') ? $request->file('image')->getClientOriginalName() : null,
            'file_size' => $request->hasFile('image') ? $request->file('image')->getSize() : null,
            'file_mime' => $request->hasFile('image') ? $request->file('image')->getMimeType() : null,
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,heic,heif|max:5120',
            'category_id' => 'nullable|exists:categories,id',
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
                $directory = storage_path('app/public/services');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                    Log::info('Created directory: ' . $directory);
                }
                
                $imagePath = $image->store('services', 'public');
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

        Service::create($validated);
        Log::info('Service created successfully');
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,heic,heif|max:5120',
            'category_id' => 'nullable|exists:categories,id',
        ], [
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif, webp, heic, or heif.',
            'image.max' => 'The image may not be greater than 5MB.',
        ]);

        if ($request->hasFile('image')) {
            try {
                // Delete old image if exists
                if ($service->image) {
                    Storage::disk('public')->delete($service->image);
                }
                
                $image = $request->file('image');
                
                // Ensure the directory exists
                $directory = storage_path('app/public/services');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                
                $validated['image'] = $image->store('services', 'public');
            } catch (\Exception $e) {
                Log::error('Image upload failed: ' . $e->getMessage());
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'Failed to upload image. Please try again or use a different image format.']);
            }
        }

        $service->update($validated);
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
} 