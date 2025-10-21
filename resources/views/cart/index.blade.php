@extends('layouts.app')

@section('title', 'Shopping Cart - Medzfitt')

@section('content')
<!-- Page Header -->
<div class="relative bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute transform rotate-45 -right-20 -top-20 w-96 h-96 bg-white rounded-full"></div>
        <div class="absolute transform rotate-45 -left-20 -bottom-20 w-96 h-96 bg-white rounded-full"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <div class="mb-6">
                <i class="fas fa-shopping-cart text-6xl mb-4"></i>
            </div>
            <h1 class="text-5xl lg:text-6xl font-bold mb-4">Shopping Cart</h1>
            <p class="text-xl text-blue-100">Review and manage your selected items</p>
            <div class="mt-6 flex items-center justify-center space-x-2 text-blue-100">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <i class="fas fa-chevron-right text-sm"></i>
                <span>Cart</span>
            </div>
        </div>
    </div>
</div>

<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($cartItems->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Cart Header Card -->
                    <div class="bg-white rounded-2xl shadow-md p-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-2xl font-bold text-gray-900">
                                <i class="fas fa-shopping-bag mr-3 text-blue-600"></i>
                                Cart Items <span class="text-blue-600">({{ $cartItems->count() }})</span>
                            </h2>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-white hover:bg-red-600 px-4 py-2 rounded-lg transition font-semibold">
                                    <i class="fas fa-trash mr-2"></i> Clear Cart
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Cart Items List -->
                    <div class="space-y-4">
                        @foreach($cartItems as $item)
                            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                                <div class="p-6 flex flex-col md:flex-row gap-6">
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('products.show', $item->product->slug) }}" class="block">
                                            @if($item->product->primaryImage && file_exists(public_path($item->product->primaryImage->image_path)))
                                                <img src="{{ asset($item->product->primaryImage->image_path) }}" 
                                                     alt="{{ $item->product->name }}" 
                                                     class="w-full md:w-32 h-48 md:h-32 object-cover rounded-xl hover:scale-105 transition-transform duration-300">
                                            @else
                                                <div class="w-full md:w-32 h-48 md:h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center">
                                                    <div class="text-center">
                                                        <i class="fas fa-tshirt text-4xl text-gray-400 mb-2"></i>
                                                        <p class="text-xs text-gray-400">No Image</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    
                                    <!-- Product Details -->
                                    <div class="flex-1 space-y-3">
                                        <div>
                                            <h3 class="font-bold text-xl mb-2 text-gray-900">
                                                <a href="{{ route('products.show', $item->product->slug) }}" class="hover:text-blue-600 transition">
                                                    {{ $item->product->name }}
                                                </a>
                                            </h3>
                                            @if($item->product->category)
                                                <p class="text-sm text-blue-600 font-semibold uppercase">{{ $item->product->category->name }}</p>
                                            @endif
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <div>
                                                <p class="text-sm text-gray-600 mb-1">Unit Price</p>
                                                <p class="text-blue-600 font-bold text-2xl">
                                                    Rs.{{ number_format($item->product->current_price, 0) }}
                                                </p>
                                            </div>
                                            @if($item->product->sale_price)
                                                <span class="bg-red-100 text-red-600 text-xs font-bold px-3 py-1.5 rounded-full">
                                                    SALE
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Stock Status -->
                                        @if($item->product->stock_quantity > 0)
                                            <p class="text-sm text-green-600 flex items-center">
                                                <i class="fas fa-check-circle mr-2"></i>
                                                <span class="font-semibold">In Stock ({{ $item->product->stock_quantity }} available)</span>
                                            </p>
                                        @else
                                            <p class="text-sm text-red-600 flex items-center">
                                                <i class="fas fa-times-circle mr-2"></i>
                                                <span class="font-semibold">Out of Stock</span>
                                            </p>
                                        @endif
                                        
                                        <!-- Quantity Update -->
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center gap-3">
                                            @csrf
                                            @method('PATCH')
                                            <label class="text-sm font-bold text-gray-700">Quantity:</label>
                                            <div class="flex items-center border-2 border-gray-300 rounded-lg overflow-hidden">
                                                <button type="button" onclick="this.nextElementSibling.stepDown()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 transition font-bold">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" 
                                                       name="quantity" 
                                                       value="{{ $item->quantity }}" 
                                                       min="1" 
                                                       max="{{ $item->product->stock_quantity }}"
                                                       class="w-16 text-center py-2 font-bold border-0 focus:outline-none">
                                                <button type="button" onclick="this.previousElementSibling.stepUp()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 transition font-bold">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold shadow-md">
                                                <i class="fas fa-sync-alt mr-2"></i> Update
                                            </button>
                                        </form>
                                    </div>
                                    
                                    <!-- Item Total & Remove -->
                                    <div class="flex md:flex-col justify-between md:justify-start items-end md:items-end text-right space-y-4">
                                        <div>
                                            <p class="text-sm text-gray-600 mb-1">Subtotal</p>
                                            <p class="font-bold text-3xl text-gray-900">Rs.{{ number_format($item->subtotal, 0) }}</p>
                                        </div>
                                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-white hover:bg-red-600 px-4 py-2 rounded-lg transition font-semibold border-2 border-red-600">
                                                <i class="fas fa-times-circle mr-2"></i> Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Continue Shopping -->
                    <div class="bg-white rounded-2xl shadow-md p-6">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold text-lg group">
                            <i class="fas fa-arrow-left mr-3 group-hover:-translate-x-2 transition-transform"></i>
                            Continue Shopping
                        </a>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-8 sticky top-24">
                        <h2 class="text-2xl font-bold mb-6 text-gray-900 flex items-center">
                            <i class="fas fa-receipt mr-3 text-blue-600"></i>
                            Order Summary
                        </h2>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-700">Subtotal</span>
                                <span class="font-bold text-gray-900">Rs.{{ number_format($subtotal, 0) }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-700">Items</span>
                                <span class="font-bold text-blue-600">{{ $cartItems->count() }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                                <span class="text-gray-700">Shipping</span>
                                <span class="font-semibold text-green-600">
                                    @if($subtotal >= 5000)
                                        FREE
                                    @else
                                        At Checkout
                                    @endif
                                </span>
                            </div>
                            
                            @if($subtotal < 5000)
                                <div class="p-3 bg-blue-50 rounded-lg border-l-4 border-blue-600">
                                    <p class="text-sm text-blue-800">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Add <span class="font-bold">Rs.{{ number_format(5000 - $subtotal, 0) }}</span> more for FREE shipping!
                                    </p>
                                </div>
                            @else
                                <div class="p-3 bg-green-50 rounded-lg border-l-4 border-green-600">
                                    <p class="text-sm text-green-800">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        You qualify for <span class="font-bold">FREE SHIPPING</span>!
                                    </p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="border-t-2 border-gray-200 pt-4 mb-6">
                            <div class="flex justify-between items-center p-4 bg-blue-50 rounded-xl">
                                <span class="text-xl font-bold text-gray-900">Total</span>
                                <span class="text-3xl font-bold text-blue-600">Rs.{{ number_format($subtotal, 0) }}</span>
                            </div>
                        </div>
                        
                        @auth
                            <a href="{{ route('orders.checkout') }}" 
                               class="block w-full bg-blue-600 text-white text-center py-4 rounded-xl font-bold text-lg hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1 mb-3">
                                <i class="fas fa-lock mr-2"></i>
                                Proceed to Checkout
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="block w-full bg-blue-600 text-white text-center py-4 rounded-xl font-bold text-lg hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1 mb-3">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Login to Checkout
                            </a>
                            <p class="text-center text-sm text-gray-600">
                                or <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-semibold">create an account</a>
                            </p>
                        @endauth

                        <!-- Trust Badges -->
                        <div class="mt-6 pt-6 border-t-2 border-gray-200 space-y-4">
                            <h4 class="font-bold text-gray-900 mb-4">Why Shop With Us?</h4>
                            <div class="flex items-center gap-3 p-3 bg-green-50 rounded-lg">
                                <i class="fas fa-shield-alt text-2xl text-green-600"></i>
                                <span class="text-sm text-gray-700 font-semibold">100% Secure Checkout</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-lg">
                                <i class="fas fa-truck text-2xl text-blue-600"></i>
                                <span class="text-sm text-gray-700 font-semibold">Free Shipping Above Rs.5,000</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-orange-50 rounded-lg">
                                <i class="fas fa-undo text-2xl text-orange-600"></i>
                                <span class="text-sm text-gray-700 font-semibold">30-Day Easy Returns</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-purple-50 rounded-lg">
                                <i class="fas fa-headset text-2xl text-purple-600"></i>
                                <span class="text-sm text-gray-700 font-semibold">24/7 Customer Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart -->
            <div class="text-center py-16">
                <div class="bg-white rounded-2xl shadow-lg p-16 max-w-2xl mx-auto">
                    <div class="mb-8">
                        <i class="fas fa-shopping-cart text-9xl text-gray-300 mb-6"></i>
                    </div>
                    <h2 class="text-4xl font-bold mb-4 text-gray-900">Your Cart is Empty</h2>
                    <p class="text-gray-600 mb-8 text-lg">Looks like you haven't added any items to your cart yet. Start exploring our products!</p>
                    <a href="{{ route('products.index') }}" 
                       class="inline-block bg-blue-600 text-white px-10 py-4 rounded-xl font-bold text-lg hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Start Shopping Now
                    </a>

                    <!-- Quick Links -->
                    <div class="mt-12 pt-8 border-t">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Explore Our Categories</h3>
                        <div class="flex flex-wrap justify-center gap-3">
                            @foreach(\App\Models\Category::active()->ordered()->limit(4)->get() as $cat)
                                <a href="{{ route('products.category', $cat->slug) }}" 
                                   class="px-6 py-3 bg-gray-100 hover:bg-blue-600 hover:text-white rounded-xl font-semibold transition shadow-md">
                                    {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- You May Also Like -->
@if($cartItems->count() > 0)
    <div class="bg-white py-20 border-t">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">You May Also Like</h2>
                <p class="text-gray-600 text-lg">Continue shopping with these handpicked recommendations</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach(\App\Models\Product::with('primaryImage')->active()->inRandomOrder()->limit(4)->get() as $product)
                    <div class="group">
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2 border border-gray-100">
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

                                @if($product->sale_price)
                                    <div class="absolute top-3 left-3">
                                        <span class="bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">
                                            -{{ $product->discount_percentage }}% OFF
                                        </span>
                                    </div>
                                @endif

                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                    <a href="{{ route('products.show', $product->slug) }}" 
                                       class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-5 py-2.5 rounded-lg font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 shadow-lg text-sm">
                                        <i class="fas fa-eye mr-1"></i> Quick View
                                    </a>
                                </div>
                            </div>

                            <div class="p-5">
                                @if($product->category)
                                    <p class="text-xs text-blue-600 font-semibold mb-2 uppercase">{{ $product->category->name }}</p>
                                @endif
                                
                                <h3 class="font-bold text-base mb-3 line-clamp-2 h-12 text-gray-900 group-hover:text-blue-600 transition-colors">
                                    {{ $product->name }}
                                </h3>
                                
                                <div class="flex items-center mb-3">
                                    <div class="flex text-yellow-400">
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="fas fa-star text-xs"></i>
                                        @endfor
                                    </div>
                                    <span class="text-xs text-gray-500 ml-2">(5.0)</span>
                                </div>

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

                                <a href="{{ route('products.show', $product->slug) }}" 
                                   class="block w-full bg-blue-600 text-white text-center py-2.5 rounded-xl font-semibold hover:bg-blue-700 transition-all shadow-md hover:shadow-lg text-sm">
                                    <i class="fas fa-eye mr-1"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@endsection
