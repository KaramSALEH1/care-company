<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $activeCategory = request('category');

        $allCategories = Category::orderBy('name')->get();
        $categoriesQuery = Category::with(['services' => function ($q) {
            $q->orderBy('name');
        }])->orderBy('name');

        if ($activeCategory && $activeCategory !== 'uncategorized') {
            $categoriesQuery->where('slug', $activeCategory);
        }

        $categories = $categoriesQuery->get();

        $uncategorizedServices = collect();
        if (!$activeCategory || $activeCategory === 'uncategorized') {
            $uncategorizedServices = Service::whereNull('category_id')->orderBy('name')->get();
        }

        return view('services', compact('categories', 'uncategorizedServices', 'allCategories', 'activeCategory'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('service-detail', compact('service'));
    }

    public function contact()
    {
        return view('contact');
    }
} 