@extends('layouts.app')

@section('title', 'Search Results - Medzfitt')

@section('content')
<!-- Search Header -->
<div class="relative bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute transform rotate-45 -right-20 -top-20 w-96 h-96 bg-white rounded-full"></div>
        <div class="absolute transform rotate-45 -left-20 -bottom-20 w-96 h-96 bg-white rounded-full"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="mb-6">
                <i class="fas fa-search text-6xl mb-4"></i>
            </div>
            <h1 class="text-5xl lg:text-6xl font-bold mb-4">Search Results</h1>
            @if(request('q'))
                <p class="text-2xl text-blue-100 mb-6">Results for: <span class="font-bold">"{{ request('q') }}"</span></p>
            @endif
            
            <!-- Enhanced Search Bar -->
            <form action="{{ route('products.search') }}" method="GET" class="mt-8">
                <div class="relative max-w-2xl mx-auto">
                    <input type="text" 
                           name="q" 
                           placeholder="Search for products..." 
                           class="w-full px-6 py-5 pr-16 text-gray-900 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-300 text-lg shadow-2xl" 
                           value="{{ request('q') }}"
                           autofocus>
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition font-semibold shadow-lg">
                        <i class="fas fa-search mr-2"></i> Search
                    </button>
                </div>
            </form>

            <div class="mt-6 flex items-center justify-center space-x-2 text-blue-100">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <i class="fas fa-chevron-right text-sm"></i>
                <span>Search Results</span>
            </div>
        </div>
    </div>
</div>

<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Results Info -->
        <div class="mb-8">
            <div class="bg-white rounded-2xl shadow-md p-6">
                <div class="flex flex-wrap items-center justify-between">
                    <div>
                        @if(request('q'))
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">
                                @if($products->count() > 0)
                                    Found {{ $products->total() }} {{ Str::plural('result', $products->total()) }}
                                @else
                                    No results found
                                @endif
                            </h2>
                            <p class="text-gray-600">Searching for: <span class="font-semibold">"{{ request('q') }}"</span></p>
                        @else
                            <h2 class="text-2xl font-bold text-gray-900">Enter a search term above</h2>
                        @endif
                    </div>
                    @if($products->count() > 0)
                        <div class="mt-4 lg:mt-0">
                            <select id="sortSelect" class="px-6 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-white">
                                <option value="latest" {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>Sort by: Latest</option>
                                <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name: A to Z</option>
                            </select>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
                <div class="group">
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden bg-gray-100" style="height: 300px;">
                            @if($product->primaryImage && file_exists(public_path($product->primaryImage->image_path)))
                                <img src="{{ asset($product->primaryImage->image_path) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                    <div class="text-center">
                                        <i class="fas fa-tshirt text-6xl text-gray-400 mb-3"></i>
                                        <p class="text-gray-500 font-semibold px-4 text-sm">{{ Str::limit($product->name, 25) }}</p>
                                        <p class="text-xs text-gray-400 mt-2">Image Coming Soon</p>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex flex-col gap-2">
                                @if($product->sale_price)
                                    <span class="bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                        -{{ $product->discount_percentage }}% OFF
                                    </span>
                                @endif
                                @if($product->is_featured)
                                    <span class="bg-yellow-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                        <i class="fas fa-star"></i> Featured
                                    </span>
                                @endif
                            </div>

                            <!-- Quick View -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                <a href="{{ route('products.show', $product->slug) }}" 
                                   class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-5 py-2.5 rounded-lg font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 shadow-lg text-sm">
                                    <i class="fas fa-eye mr-1"></i> Quick View
                                </a>
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-5">
                            @if($product->category)
                                <p class="text-xs text-blue-600 font-semibold mb-2 uppercase">{{ $product->category->name }}</p>
                            @endif
                            
                            <h3 class="font-bold text-base mb-3 line-clamp-2 h-12 text-gray-900 group-hover:text-blue-600 transition-colors">
                                {{ $product->name }}
                            </h3>
                            
                            <!-- Rating -->
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star text-xs"></i>
                                    @endfor
                                </div>
                                <span class="text-xs text-gray-500 ml-2">(5.0)</span>
                            </div>
                            
                            <!-- Price -->
                            <div class="mb-4">
                                @if($product->sale_price)
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xl font-bold text-blue-600">Rs.{{ number_format($product->sale_price, 0) }}</span>
                                        <span class="text-sm text-gray-500 line-through">Rs.{{ number_format($product->price, 0) }}</span>
                                    </div>
                                @else
                                    <span class="text-xl font-bold text-blue-600">Rs.{{ number_format($product->price, 0) }}</span>
                                @endif
                            </div>
                            
                            <!-- Stock Status -->
                            @if($product->stock_quantity > 0)
                                <p class="text-xs text-green-600 mb-4 flex items-center">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    <span class="font-semibold">In Stock</span>
                                </p>
                            @else
                                <p class="text-xs text-red-600 mb-4 flex items-center">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    <span class="font-semibold">Out of Stock</span>
                                </p>
                            @endif
                            
                            <!-- View Button -->
                            <a href="{{ route('products.show', $product->slug) }}" 
                               class="block w-full bg-blue-600 text-white text-center py-2.5 rounded-xl font-semibold hover:bg-blue-700 transition-all shadow-md hover:shadow-lg text-sm">
                                <i class="fas fa-shopping-cart mr-1"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-2xl shadow-lg p-16 text-center">
                        @if(request('q'))
                            <i class="fas fa-search text-8xl text-gray-300 mb-6"></i>
                            <h3 class="text-3xl font-bold text-gray-700 mb-4">No Products Found</h3>
                            <p class="text-gray-500 mb-8 text-lg">We couldn't find any products matching "<span class="font-semibold">{{ request('q') }}</span>"</p>
                            <div class="max-w-xl mx-auto">
                                <h4 class="text-lg font-semibold text-gray-700 mb-4">Try these suggestions:</h4>
                                <ul class="text-left text-gray-600 space-y-2 mb-8">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-blue-600 mr-3 mt-1"></i>
                                        <span>Check your spelling</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-blue-600 mr-3 mt-1"></i>
                                        <span>Try more general keywords</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-blue-600 mr-3 mt-1"></i>
                                        <span>Try different keywords</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-blue-600 mr-3 mt-1"></i>
                                        <span>Browse our categories instead</span>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <i class="fas fa-search text-8xl text-gray-300 mb-6"></i>
                            <h3 class="text-3xl font-bold text-gray-700 mb-4">Start Your Search</h3>
                            <p class="text-gray-500 mb-8 text-lg">Enter a search term above to find products</p>
                        @endif
                        
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-lg">
                                <i class="fas fa-th mr-2"></i> Browse All Products
                            </a>
                            <a href="{{ route('home') }}" class="inline-block bg-gray-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-gray-700 transition shadow-lg">
                                <i class="fas fa-home mr-2"></i> Back to Home
                            </a>
                        </div>

                        <!-- Popular Categories -->
                        @if(\App\Models\Category::active()->count() > 0)
                            <div class="mt-12 pt-8 border-t">
                                <h4 class="text-xl font-bold text-gray-700 mb-6">Browse by Category</h4>
                                <div class="flex flex-wrap justify-center gap-3">
                                    @foreach(\App\Models\Category::active()->ordered()->limit(6)->get() as $cat)
                                        <a href="{{ route('products.category', $cat->slug) }}" 
                                           class="px-6 py-3 bg-gray-100 hover:bg-blue-600 hover:text-white rounded-xl font-semibold transition shadow-md">
                                            {{ $cat->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="mt-12">
                <div class="bg-white rounded-2xl shadow-md p-6">
                    {{ $products->links() }}
                </div>
            </div>
        @endif

        <!-- Related Categories or Popular Products -->
        @if(request('q') && $products->count() == 0)
            @php
                $popularProducts = \App\Models\Product::active()->inStock()->limit(4)->get();
            @endphp
            
            @if($popularProducts->count() > 0)
                <div class="mt-16">
                    <div class="text-center mb-10">
                        <h2 class="text-4xl font-bold text-gray-900 mb-3">Popular Products</h2>
                        <p class="text-gray-600 text-lg">You might be interested in these items</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach($popularProducts as $product)
                            <div class="group">
                                <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                                    <div class="relative overflow-hidden bg-gray-100" style="height: 300px;">
                                        @if($product->primaryImage && file_exists(public_path($product->primaryImage->image_path)))
                                            <img src="{{ asset($product->primaryImage->image_path) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                                <div class="text-center">
                                                    <i class="fas fa-tshirt text-6xl text-gray-400 mb-3"></i>
                                                    <p class="text-gray-500 font-semibold px-4 text-sm">{{ Str::limit($product->name, 25) }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="p-5">
                                        @if($product->category)
                                            <p class="text-xs text-blue-600 font-semibold mb-2 uppercase">{{ $product->category->name }}</p>
                                        @endif
                                        <h3 class="font-bold text-base mb-3 line-clamp-2 h-12">{{ $product->name }}</h3>
                                        <div class="mb-4">
                                            <span class="text-xl font-bold text-blue-600">Rs.{{ number_format($product->current_price, 0) }}</span>
                                        </div>
                                        <a href="{{ route('products.show', $product->slug) }}" 
                                           class="block w-full bg-blue-600 text-white text-center py-2.5 rounded-xl font-semibold hover:bg-blue-700 transition text-sm">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>

@if($products->count() > 0)
<script>
    // Handle sort changes
    document.getElementById('sortSelect').addEventListener('change', function() {
        const url = new URL(window.location.href);
        const params = new URLSearchParams(url.search);
        
        const sortValue = this.value;
        if (sortValue && sortValue !== 'latest') {
            params.set('sort', sortValue);
        } else {
            params.delete('sort');
        }

        // Redirect with new parameters
        window.location.href = url.pathname + '?' + params.toString();
    });
</script>
@endif
@endsection
