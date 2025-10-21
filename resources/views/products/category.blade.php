@extends('layouts.app')

@section('title', $category->name . ' - Medzfitt')

@section('content')
<!-- Category Header -->
<div class="relative bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute transform rotate-45 -right-20 -top-20 w-96 h-96 bg-white rounded-full"></div>
        <div class="absolute transform rotate-45 -left-20 -bottom-20 w-96 h-96 bg-white rounded-full"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <!-- Category Icon/Image -->
            @if($category->image && file_exists(public_path($category->image)))
                <div class="mb-6">
                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-24 h-24 object-cover rounded-2xl mx-auto shadow-2xl">
                </div>
            @else
                <div class="mb-6">
                    <div class="w-24 h-24 bg-white bg-opacity-20 rounded-2xl mx-auto flex items-center justify-center">
                        <i class="fas fa-th-large text-4xl"></i>
                    </div>
                </div>
            @endif
            
            <h1 class="text-5xl lg:text-6xl font-bold mb-4">{{ $category->name }}</h1>
            
            @if($category->description)
                <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">{{ $category->description }}</p>
            @endif
            
            <div class="mt-6 flex items-center justify-center space-x-2 text-blue-100">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <i class="fas fa-chevron-right text-sm"></i>
                <a href="{{ route('products.index') }}" class="hover:text-white transition">Products</a>
                <i class="fas fa-chevron-right text-sm"></i>
                <span>{{ $category->name }}</span>
            </div>
        </div>
    </div>
</div>

<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar -->
            <aside class="lg:w-80 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                    <h3 class="text-2xl font-bold mb-6 text-gray-900 flex items-center">
                        <i class="fas fa-list mr-3 text-blue-600"></i>
                        Categories
                    </h3>
                    
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('products.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="flex items-center text-gray-700 group-hover:text-blue-600">
                                    <i class="fas fa-th mr-3"></i>
                                    All Products
                                </span>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600"></i>
                            </a>
                        </li>
                        @foreach(\App\Models\Category::active()->ordered()->get() as $cat)
                            <li>
                                <a href="{{ route('products.category', $cat->slug) }}" 
                                   class="flex items-center justify-between p-3 rounded-lg transition group {{ $cat->id === $category->id ? 'bg-blue-600 text-white' : 'hover:bg-blue-50' }}">
                                    <span class="{{ $cat->id === $category->id ? 'text-white' : 'text-gray-700 group-hover:text-blue-600' }}">
                                        {{ $cat->name }}
                                    </span>
                                    <i class="fas fa-chevron-right {{ $cat->id === $category->id ? 'text-white' : 'text-gray-400 group-hover:text-blue-600' }}"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Price Range Slider -->
                    <div class="mt-8 border-t pt-6">
                        <h4 class="font-bold text-lg mb-4 text-gray-900">Price Range</h4>
                        <div class="space-y-4">
                            <!-- Price Display -->
                            <div class="flex justify-between items-center">
                                <div class="flex-1">
                                    <label class="text-xs text-gray-600 mb-1 block">Min Price</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-semibold">Rs.</span>
                                        <input type="number" 
                                               id="minPriceInput" 
                                               value="{{ request('min_price', $priceRange['min']) }}"
                                               min="{{ $priceRange['min'] }}"
                                               max="{{ $priceRange['max'] }}"
                                               class="w-full pl-10 pr-2 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent font-semibold">
                                    </div>
                                </div>
                                <span class="mx-3 text-gray-400 mt-5">-</span>
                                <div class="flex-1">
                                    <label class="text-xs text-gray-600 mb-1 block">Max Price</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-semibold">Rs.</span>
                                        <input type="number" 
                                               id="maxPriceInput" 
                                               value="{{ request('max_price', $priceRange['max']) }}"
                                               min="{{ $priceRange['min'] }}"
                                               max="{{ $priceRange['max'] }}"
                                               class="w-full pl-10 pr-2 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent font-semibold">
                                    </div>
                                </div>
                            </div>

                            <!-- Dual Range Slider -->
                            <div class="relative pt-2 pb-4">
                                <div class="relative h-2 bg-gray-200 rounded-full">
                                    <div id="priceRangeBar" class="absolute h-full bg-blue-600 rounded-full"></div>
                                </div>
                                <input type="range" 
                                       id="minPriceRange" 
                                       min="{{ $priceRange['min'] }}" 
                                       max="{{ $priceRange['max'] }}" 
                                       value="{{ request('min_price', $priceRange['min']) }}"
                                       class="absolute w-full h-2 bg-transparent appearance-none pointer-events-none range-slider-thumb"
                                       style="top: 0.5rem;">
                                <input type="range" 
                                       id="maxPriceRange" 
                                       min="{{ $priceRange['min'] }}" 
                                       max="{{ $priceRange['max'] }}" 
                                       value="{{ request('max_price', $priceRange['max']) }}"
                                       class="absolute w-full h-2 bg-transparent appearance-none pointer-events-none range-slider-thumb"
                                       style="top: 0.5rem;">
                            </div>

                            <!-- Apply Button -->
                            <button onclick="applyPriceFilter()" 
                                    class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-md hover:shadow-lg">
                                <i class="fas fa-filter mr-2"></i> Apply Filter
                            </button>

                            <!-- Reset Button -->
                            @if(request('min_price') || request('max_price'))
                                <button onclick="resetPriceFilter()" 
                                        class="w-full bg-gray-200 text-gray-700 py-2 rounded-lg font-semibold hover:bg-gray-300 transition text-sm">
                                    <i class="fas fa-redo mr-2"></i> Reset Price
                                </button>
                            @endif
                        </div>
                    </div>

                    <style>
                        .range-slider-thumb {
                            pointer-events: auto;
                        }
                        .range-slider-thumb::-webkit-slider-thumb {
                            appearance: none;
                            width: 20px;
                            height: 20px;
                            background: #2563eb;
                            border: 3px solid white;
                            border-radius: 50%;
                            cursor: pointer;
                            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
                        }
                        .range-slider-thumb::-moz-range-thumb {
                            width: 20px;
                            height: 20px;
                            background: #2563eb;
                            border: 3px solid white;
                            border-radius: 50%;
                            cursor: pointer;
                            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
                        }
                    </style>
                </div>
            </aside>

            <!-- Products Grid -->
            <div class="flex-1">
                <!-- Results Header -->
                <div class="flex flex-wrap justify-between items-center mb-8 bg-white rounded-2xl shadow-md p-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ $category->name }} Products</h2>
                        <p class="text-gray-600 mt-1">Showing <span class="font-semibold">{{ $products->count() }}</span> of <span class="font-semibold">{{ $products->total() }}</span> products</p>
                    </div>
                    <div class="mt-4 lg:mt-0">
                        <select id="sortSelect" class="px-6 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-white">
                            <option value="latest" {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>Sort by: Latest</option>
                            <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name: A to Z</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($products as $product)
                        <div class="group">
                            <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                                <!-- Product Image -->
                                <div class="relative overflow-hidden bg-gray-100" style="height: 350px;">
                                    @if($product->primaryImage && file_exists(public_path($product->primaryImage->image_path)))
                                        <img src="{{ asset($product->primaryImage->image_path) }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                            <div class="text-center">
                                                <i class="fas fa-tshirt text-7xl text-gray-400 mb-4"></i>
                                                <p class="text-gray-500 font-semibold px-4">{{ Str::limit($product->name, 30) }}</p>
                                                <p class="text-sm text-gray-400 mt-2">Image Coming Soon</p>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <!-- Badges -->
                                    <div class="absolute top-4 left-4 flex flex-col gap-2">
                                        @if($product->sale_price)
                                            <span class="bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">
                                                -{{ $product->discount_percentage }}% OFF
                                            </span>
                                        @endif
                                        @if($product->is_featured)
                                            <span class="bg-yellow-500 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">
                                                <i class="fas fa-star"></i> Featured
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Quick View -->
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                        <a href="{{ route('products.show', $product->slug) }}" 
                                           class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 shadow-lg">
                                            <i class="fas fa-eye mr-2"></i> Quick View
                                        </a>
                                    </div>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="p-6">
                                    <p class="text-xs text-blue-600 font-semibold mb-2 uppercase">{{ $category->name }}</p>
                                    
                                    <h3 class="font-bold text-lg mb-3 line-clamp-2 h-14 text-gray-900 group-hover:text-blue-600 transition-colors">
                                        {{ $product->name }}
                                    </h3>
                                    
                                    <!-- Rating -->
                                    <div class="flex items-center mb-3">
                                        <div class="flex text-yellow-400">
                                            @for($i = 0; $i < 5; $i++)
                                                <i class="fas fa-star text-sm"></i>
                                            @endfor
                                        </div>
                                        <span class="text-sm text-gray-500 ml-2">(5.0)</span>
                                    </div>
                                    
                                    <!-- Price -->
                                    <div class="mb-4">
                                        @if($product->sale_price)
                                            <div class="flex items-center space-x-3">
                                                <span class="text-2xl font-bold text-blue-600">Rs.{{ number_format($product->sale_price, 0) }}</span>
                                                <span class="text-lg text-gray-500 line-through">Rs.{{ number_format($product->price, 0) }}</span>
                                            </div>
                                        @else
                                            <span class="text-2xl font-bold text-blue-600">Rs.{{ number_format($product->price, 0) }}</span>
                                        @endif
                                    </div>
                                    
                                    <!-- Stock Status -->
                                    @if($product->stock_quantity > 0)
                                        <p class="text-sm text-green-600 mb-4 flex items-center">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            <span class="font-semibold">In Stock</span>
                                        </p>
                                    @else
                                        <p class="text-sm text-red-600 mb-4 flex items-center">
                                            <i class="fas fa-times-circle mr-2"></i>
                                            <span class="font-semibold">Out of Stock</span>
                                        </p>
                                    @endif
                                    
                                    <!-- View Button -->
                                    <a href="{{ route('products.show', $product->slug) }}" 
                                       class="block w-full bg-blue-600 text-white text-center py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all shadow-md hover:shadow-lg">
                                        <i class="fas fa-shopping-cart mr-2"></i> View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="bg-white rounded-2xl shadow-lg p-16 text-center">
                                <i class="fas fa-box-open text-8xl text-gray-300 mb-6"></i>
                                <h3 class="text-3xl font-bold text-gray-700 mb-4">No Products in this Category</h3>
                                <p class="text-gray-500 mb-8 text-lg">We're currently updating our inventory. Check back soon!</p>
                                <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-lg">
                                    <i class="fas fa-th mr-2"></i> View All Products
                                </a>
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
            </div>
        </div>
    </div>
</div>

<script>
    // Price range slider functionality
    const minPriceInput = document.getElementById('minPriceInput');
    const maxPriceInput = document.getElementById('maxPriceInput');
    const minPriceRange = document.getElementById('minPriceRange');
    const maxPriceRange = document.getElementById('maxPriceRange');
    const priceRangeBar = document.getElementById('priceRangeBar');

    const priceMin = {{ $priceRange['min'] }};
    const priceMax = {{ $priceRange['max'] }};

    // Update range bar visualization
    function updateRangeBar() {
        const minVal = parseInt(minPriceRange.value);
        const maxVal = parseInt(maxPriceRange.value);
        
        const percentMin = ((minVal - priceMin) / (priceMax - priceMin)) * 100;
        const percentMax = ((maxVal - priceMin) / (priceMax - priceMin)) * 100;
        
        priceRangeBar.style.left = percentMin + '%';
        priceRangeBar.style.width = (percentMax - percentMin) + '%';
    }

    // Sync slider with input
    minPriceRange.addEventListener('input', function() {
        let value = parseInt(this.value);
        const maxValue = parseInt(maxPriceRange.value);
        
        if (value >= maxValue) {
            value = maxValue - 1;
            this.value = value;
        }
        
        minPriceInput.value = value;
        updateRangeBar();
    });

    maxPriceRange.addEventListener('input', function() {
        let value = parseInt(this.value);
        const minValue = parseInt(minPriceRange.value);
        
        if (value <= minValue) {
            value = minValue + 1;
            this.value = value;
        }
        
        maxPriceInput.value = value;
        updateRangeBar();
    });

    // Sync input with slider
    minPriceInput.addEventListener('input', function() {
        let value = parseInt(this.value) || priceMin;
        value = Math.max(priceMin, Math.min(value, priceMax - 1));
        
        minPriceRange.value = value;
        this.value = value;
        updateRangeBar();
    });

    maxPriceInput.addEventListener('input', function() {
        let value = parseInt(this.value) || priceMax;
        value = Math.min(priceMax, Math.max(value, priceMin + 1));
        
        maxPriceRange.value = value;
        this.value = value;
        updateRangeBar();
    });

    // Initialize range bar
    updateRangeBar();

    // Apply price filter
    function applyPriceFilter() {
        const url = new URL(window.location.href);
        const params = new URLSearchParams();

        const minPrice = minPriceInput.value;
        const maxPrice = maxPriceInput.value;

        if (minPrice && minPrice != priceMin) {
            params.set('min_price', minPrice);
        }
        if (maxPrice && maxPrice != priceMax) {
            params.set('max_price', maxPrice);
        }

        // Preserve sort parameter
        const currentSort = new URLSearchParams(window.location.search).get('sort');
        if (currentSort) {
            params.set('sort', currentSort);
        }

        window.location.href = url.pathname + (params.toString() ? '?' + params.toString() : '');
    }

    // Reset price filter
    function resetPriceFilter() {
        const url = new URL(window.location.href);
        const params = new URLSearchParams(url.search);
        
        params.delete('min_price');
        params.delete('max_price');

        window.location.href = url.pathname + (params.toString() ? '?' + params.toString() : '');
    }

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

        window.location.href = url.pathname + (params.toString() ? '?' + params.toString() : '');
    });
</script>
@endsection
