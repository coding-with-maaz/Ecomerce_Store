<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with(['category', 'primaryImage'])
            ->featured()
            ->active()
            ->limit(8)
            ->get();

        $categories = Category::active()
            ->ordered()
            ->get();

        $latestProducts = Product::with(['category', 'primaryImage'])
            ->active()
            ->latest()
            ->limit(8)
            ->get();

        return view('home', compact('featuredProducts', 'categories', 'latestProducts'));
    }
}

