<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'primaryImage'])->active();

        // Get min and max prices from database
        $priceRange = $this->getPriceRange();

        // Apply price range filter
        $query = $this->applyPriceRangeFilter($query, $request);

        // Apply sorting
        $query = $this->applySorting($query, $request);

        $products = $query->paginate(12)->withQueryString();

        return view('products.index', compact('products', 'priceRange'));
    }

    public function show($slug)
    {
        $product = Product::with(['category', 'images', 'variants', 'reviews.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = Product::with('primaryImage')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function category($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $query = Product::with(['category', 'primaryImage'])
            ->where('category_id', $category->id)
            ->active();

        // Get min and max prices from database for this category
        $priceRange = $this->getPriceRange($category->id);

        // Apply price range filter
        $query = $this->applyPriceRangeFilter($query, $request);

        // Apply sorting
        $query = $this->applySorting($query, $request);

        $products = $query->paginate(12)->withQueryString();

        return view('products.category', compact('category', 'products', 'priceRange'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        
        $query = Product::with(['category', 'primaryImage'])
            ->where(function($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            })
            ->active();

        // Get min and max prices from database
        $priceRange = $this->getPriceRange();

        // Apply price range filter
        $query = $this->applyPriceRangeFilter($query, $request);

        // Apply sorting
        $query = $this->applySorting($query, $request);

        $products = $query->paginate(12)->withQueryString();

        return view('products.search', compact('products', 'priceRange'));
    }

    private function getPriceRange($categoryId = null)
    {
        $query = Product::active();
        
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $minPrice = $query->selectRaw('MIN(COALESCE(sale_price, price)) as min_price')->value('min_price') ?? 0;
        $maxPrice = $query->selectRaw('MAX(COALESCE(sale_price, price)) as max_price')->value('max_price') ?? 10000;

        return [
            'min' => floor($minPrice),
            'max' => ceil($maxPrice)
        ];
    }

    private function applyPriceRangeFilter($query, Request $request)
    {
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        if ($minPrice !== null || $maxPrice !== null) {
            if ($minPrice !== null && $maxPrice !== null) {
                $query->whereRaw('COALESCE(sale_price, price) BETWEEN ? AND ?', [$minPrice, $maxPrice]);
            } elseif ($minPrice !== null) {
                $query->whereRaw('COALESCE(sale_price, price) >= ?', [$minPrice]);
            } elseif ($maxPrice !== null) {
                $query->whereRaw('COALESCE(sale_price, price) <= ?', [$maxPrice]);
            }
        }

        return $query;
    }

    private function applySorting($query, Request $request)
    {
        $sort = $request->input('sort', 'latest');

        switch ($sort) {
            case 'price-low':
                $query->orderByRaw('COALESCE(sale_price, price) ASC');
                break;
            case 'price-high':
                $query->orderByRaw('COALESCE(sale_price, price) DESC');
                break;
            case 'name':
                $query->orderBy('name', 'ASC');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        return $query;
    }
}

