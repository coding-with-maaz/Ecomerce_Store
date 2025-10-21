<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public API routes
Route::prefix('v1')->group(function () {
    
    // Products
    Route::get('/products', function (Request $request) {
        $products = Product::with(['category', 'primaryImage', 'variants'])
            ->active()
            ->when($request->category_id, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->when($request->featured, function ($query) {
                return $query->featured();
            })
            ->when($request->search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($request->per_page ?? 12);
        
        return response()->json($products);
    });

    Route::get('/products/{slug}', function ($slug) {
        $product = Product::with(['category', 'images', 'variants', 'reviews.user'])
            ->where('slug', $slug)
            ->firstOrFail();
        
        return response()->json($product);
    });

    // Categories
    Route::get('/categories', function () {
        $categories = Category::active()->ordered()->get();
        return response()->json($categories);
    });

    Route::get('/categories/{slug}', function ($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();
        return response()->json($category);
    });

    // Orders (protected)
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/orders', function (Request $request) {
            $orders = Order::with('items.product')
                ->where('user_id', $request->user()->id)
                ->latest()
                ->paginate(10);
            
            return response()->json($orders);
        });

        Route::get('/orders/{order}', function (Request $request, Order $order) {
            if ($order->user_id !== $request->user()->id) {
                abort(403);
            }
            
            $order->load('items.product');
            return response()->json($order);
        });
    });
});

