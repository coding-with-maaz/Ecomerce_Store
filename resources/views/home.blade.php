@extends('layouts.app')

@section('title', 'Medzfitt - Premium Medical Wear')

@section('content')
<!-- Hero Section Slider -->
<div class="relative overflow-hidden">
    <div id="heroSlider" class="relative">
        <!-- Slide 1 -->
        <div class="hero-slide active relative bg-gradient-to-r from-gray-500 to-gray-600">
            <div class="absolute inset-0 bg-black opacity-30"></div>
            <div class="container mx-auto px-4 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 items-center min-h-[550px]">
                    <div class="py-16 lg:py-0">
                        <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight animate-fadeInUp">
                            <span class="text-white">Modern Designs for</span><br>
                            <span class="text-blue-400">Healthcare Professionals</span>
                        </h1>
                        <p class="text-xl text-gray-200 mb-8 animate-fadeInUp animation-delay-200">Premium quality medical wear designed for comfort and professionalism</p>
                        <div class="flex flex-wrap gap-4 animate-fadeInUp animation-delay-400">
                            <a href="{{ route('products.index') }}" class="bg-blue-600 text-white px-8 py-4 rounded-lg hover:bg-blue-700 transition flex items-center text-lg font-semibold shadow-lg">
                                <i class="fas fa-tag mr-2"></i>
                                SALE ITEMS
                            </a>
                            <a href="{{ route('products.category', 'accessories') }}" class="bg-white text-gray-800 px-8 py-4 rounded-lg hover:bg-gray-100 transition flex items-center text-lg font-semibold shadow-lg">
                                <i class="fas fa-th mr-2"></i>
                                ACCESSORIES
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:flex justify-center items-center">
                        <div class="relative animate-float">
                            <div class="absolute -inset-4 bg-blue-600 rounded-full opacity-20 blur-2xl"></div>
                            <i class="fas fa-user-md text-white text-9xl relative"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide relative bg-gradient-to-r from-blue-600 to-blue-800">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="container mx-auto px-4 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 items-center min-h-[550px]">
                    <div class="py-16 lg:py-0">
                        <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                            <span class="text-white">Premium Quality</span><br>
                            <span class="text-yellow-300">Medical Scrubs</span>
                        </h1>
                        <p class="text-xl text-blue-100 mb-8">Stretchable fabric with maximum comfort for long shifts</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('products.category', 'strechtable-scrub') }}" class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg hover:bg-yellow-300 transition flex items-center text-lg font-semibold shadow-lg">
                                <i class="fas fa-star mr-2"></i>
                                SHOP NOW
                            </a>
                            <a href="{{ route('products.index') }}" class="bg-white text-gray-800 px-8 py-4 rounded-lg hover:bg-gray-100 transition flex items-center text-lg font-semibold shadow-lg">
                                VIEW ALL
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:flex justify-center items-center">
                        <div class="relative">
                            <div class="absolute -inset-4 bg-yellow-400 rounded-full opacity-20 blur-2xl"></div>
                            <i class="fas fa-tshirt text-white text-9xl relative"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide relative bg-gradient-to-r from-purple-600 to-pink-600">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="container mx-auto px-4 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 items-center min-h-[550px]">
                    <div class="py-16 lg:py-0">
                        <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                            <span class="text-white">Women's Collection</span><br>
                            <span class="text-pink-200">Elegant & Professional</span>
                        </h1>
                        <p class="text-xl text-purple-100 mb-8">Specially designed scrubs for women healthcare professionals</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('products.category', 'washing-wear-scrub-for-women') }}" class="bg-pink-500 text-white px-8 py-4 rounded-lg hover:bg-pink-600 transition flex items-center text-lg font-semibold shadow-lg">
                                <i class="fas fa-female mr-2"></i>
                                WOMEN'S SCRUBS
                            </a>
                            <a href="{{ route('products.index') }}" class="bg-white text-gray-800 px-8 py-4 rounded-lg hover:bg-gray-100 transition flex items-center text-lg font-semibold shadow-lg">
                                EXPLORE MORE
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:flex justify-center items-center">
                        <div class="relative">
                            <div class="absolute -inset-4 bg-pink-400 rounded-full opacity-20 blur-2xl"></div>
                            <i class="fas fa-user-nurse text-white text-9xl relative"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Navigation Arrows -->
    <button onclick="changeSlide(-1)" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 text-white p-4 rounded-full z-20 transition backdrop-blur-sm">
        <i class="fas fa-chevron-left text-2xl"></i>
    </button>
    <button onclick="changeSlide(1)" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 text-white p-4 rounded-full z-20 transition backdrop-blur-sm">
        <i class="fas fa-chevron-right text-2xl"></i>
    </button>
    
    <!-- Slider Dots -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
        <button onclick="goToSlide(0)" class="slider-dot w-3 h-3 rounded-full bg-white shadow-lg transition-all"></button>
        <button onclick="goToSlide(1)" class="slider-dot w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-75 transition-all"></button>
        <button onclick="goToSlide(2)" class="slider-dot w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-75 transition-all"></button>
    </div>
</div>

<!-- Shop By Category Section -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold mb-4 text-gray-900">Shop By Category</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Explore our comprehensive range of medical wear designed for healthcare professionals</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories->take(6) as $index => $category)
                <a href="{{ route('products.category', $category->slug) }}" class="group">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative overflow-hidden bg-gray-100" style="height: 350px;">
                            @if($category->image && file_exists(public_path($category->image)))
                                <img src="{{ asset($category->image) }}" 
                                     alt="{{ $category->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <!-- Placeholder for missing images -->
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                                    <div class="text-center">
                                        <i class="fas fa-{{ $index % 3 == 0 ? 'user-md' : ($index % 3 == 1 ? 'tshirt' : 'briefcase-medical') }} text-8xl text-blue-400 mb-4"></i>
                                        <p class="text-blue-600 font-semibold text-lg">{{ $category->name }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Badge -->
                            <div class="absolute top-4 left-4">
                                @if($index == 0)
                                    <span class="bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">BEST SELLER</span>
                                @elseif($index == 1)
                                    <span class="bg-green-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">NEW ARRIVAL</span>
                                @else
                                    <span class="bg-blue-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">SALE</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-bold mb-3 text-gray-900 group-hover:text-blue-600 transition-colors">
                                {{ strtoupper($category->name) }}
                            </h3>
                            <span class="inline-block bg-red-600 text-white text-xs font-semibold px-5 py-2 rounded-full">
                                PREMIUM QUALITY
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- View All Categories -->
        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="inline-block bg-gray-900 text-white px-10 py-4 rounded-lg hover:bg-gray-800 transition-all text-lg font-semibold shadow-lg">
                <i class="fas fa-th-large mr-2"></i> View All Categories
            </a>
        </div>
    </div>
</div>

<!-- Latest Arrivals Section -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold mb-4 text-gray-900">Latest Arrivals</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Discover our newest collection of premium medical wear</p>
        </div>

        @if($latestProducts->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($latestProducts as $product)
                    <div class="group">
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden bg-gray-100" style="height: 350px;">
                                @if($product->primaryImage && file_exists(public_path($product->primaryImage->image_path)))
                                    <img src="{{ asset($product->primaryImage->image_path) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <!-- Professional placeholder for missing product images -->
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                        <div class="text-center">
                                            <div class="mb-4">
                                                <i class="fas fa-tshirt text-7xl text-gray-400"></i>
                                            </div>
                                            <p class="text-gray-500 font-semibold px-4">{{ Str::limit($product->name, 30) }}</p>
                                            <p class="text-sm text-gray-400 mt-2">Image Coming Soon</p>
                                        </div>
                                    </div>
                                @endif
                                
                                <!-- Sale Badge -->
                                @if($product->sale_price)
                                    <div class="absolute top-4 left-4">
                                        <span class="bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">
                                            SALE -{{ $product->discount_percentage }}%
                                        </span>
                                    </div>
                                @endif

                                <!-- Quick View on Hover -->
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                    <a href="{{ route('products.show', $product->slug) }}" 
                                       class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                        Quick View
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Product Info -->
                            <div class="p-6">
                                <h3 class="font-semibold text-lg mb-3 line-clamp-2 h-14 text-gray-900 group-hover:text-blue-600 transition-colors">
                                    {{ $product->name }}
                                </h3>
                                
                                <!-- Rating (placeholder) -->
                                <div class="flex items-center mb-3">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star text-sm"></i>
                                        <i class="fas fa-star text-sm"></i>
                                        <i class="fas fa-star text-sm"></i>
                                        <i class="fas fa-star text-sm"></i>
                                        <i class="fas fa-star text-sm"></i>
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
                                
                                <!-- Add to Cart Button -->
                                <a href="{{ route('products.show', $product->slug) }}" 
                                   class="block w-full bg-blue-600 text-white text-center py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all shadow-md hover:shadow-lg">
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-16">
                <a href="{{ route('products.index') }}" 
                   class="inline-block bg-blue-600 text-white px-12 py-4 rounded-lg font-bold text-lg hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-th-large mr-2"></i> View All Products
                </a>
            </div>
        @else
            <!-- No Products Available -->
            <div class="text-center py-16">
                <div class="bg-gray-50 rounded-2xl p-12 max-w-2xl mx-auto">
                    <i class="fas fa-box-open text-8xl text-gray-300 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-700 mb-4">No Products Available Yet</h3>
                    <p class="text-gray-500 mb-8">Check back soon for our latest arrivals!</p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Browse All Products
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-white text-center">
            <div class="group">
                <div class="mb-4 transform group-hover:scale-110 transition-transform">
                    <i class="fas fa-shipping-fast text-5xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Free Shipping</h3>
                <p class="text-blue-100">On orders above Rs.5,000</p>
            </div>
            <div class="group">
                <div class="mb-4 transform group-hover:scale-110 transition-transform">
                    <i class="fas fa-shield-alt text-5xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Secure Payment</h3>
                <p class="text-blue-100">100% secure transactions</p>
            </div>
            <div class="group">
                <div class="mb-4 transform group-hover:scale-110 transition-transform">
                    <i class="fas fa-undo text-5xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Easy Returns</h3>
                <p class="text-blue-100">7 days return policy</p>
            </div>
            <div class="group">
                <div class="mb-4 transform group-hover:scale-110 transition-transform">
                    <i class="fas fa-headset text-5xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">24/7 Support</h3>
                <p class="text-blue-100">Dedicated customer service</p>
            </div>
        </div>
    </div>
</div>

<!-- Store Locations Section -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold mb-4 text-gray-900">Our Store Locations</h2>
            <p class="text-xl text-gray-600">Visit us at any of our convenient locations across Pakistan</p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl p-10 shadow-xl hover:shadow-2xl transition-shadow">
                <div class="flex flex-col md:flex-row items-start md:items-center space-y-6 md:space-y-0 md:space-x-8">
                    <div class="bg-blue-600 rounded-2xl p-6 flex-shrink-0 transform hover:scale-110 transition-transform">
                        <i class="fas fa-store text-white text-5xl"></i>
                    </div>
                    
                    <div class="flex-1">
                        <h3 class="text-3xl font-bold mb-6 text-gray-900">Medzfitt Main Store</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start group">
                                <i class="fas fa-map-marker-alt mt-1 mr-4 text-blue-600 text-xl group-hover:scale-125 transition-transform"></i>
                                <div>
                                    <p class="font-semibold text-gray-900 mb-1">Address</p>
                                    <p class="text-gray-600">Sikandri Plaza, Park Rd, near Makhan Malai Restaurant, Chatta Bakhtawar, Islamabad, 45500</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start group">
                                <i class="fas fa-phone mt-1 mr-4 text-blue-600 text-xl group-hover:scale-125 transition-transform"></i>
                                <div>
                                    <p class="font-semibold text-gray-900 mb-1">Phone</p>
                                    <a href="tel:+923281662433" class="text-blue-600 hover:text-blue-700 font-semibold">+92 328 1662433</a>
                                </div>
                            </div>
                            
                            <div class="flex items-start group">
                                <i class="fas fa-envelope mt-1 mr-4 text-blue-600 text-xl group-hover:scale-125 transition-transform"></i>
                                <div>
                                    <p class="font-semibold text-gray-900 mb-1">Email</p>
                                    <a href="mailto:info.medzfitt@gmail.com" class="text-blue-600 hover:text-blue-700 font-semibold">info.medzfitt@gmail.com</a>
                                </div>
                            </div>

                            <div class="flex items-start group">
                                <i class="fas fa-clock mt-1 mr-4 text-blue-600 text-xl group-hover:scale-125 transition-transform"></i>
                                <div>
                                    <p class="font-semibold text-gray-900 mb-1">Working Hours</p>
                                    <p class="text-gray-600">Sunday - Friday: 10:00 AM - 8:00 PM</p>
                                </div>
                            </div>
                        </div>

                        <!-- Get Directions Button -->
                        <div class="mt-6">
                            <a href="https://maps.google.com/?q=Sikandri+Plaza+Islamabad" target="_blank" 
                               class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all shadow-md">
                                <i class="fas fa-directions mr-2"></i> Get Directions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Hero Slider Styles */
    .hero-slide {
        display: none;
        transition: opacity 0.5s ease-in-out;
    }
    
    .hero-slide.active {
        display: block;
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
    }
    
    .animation-delay-200 {
        animation-delay: 0.2s;
    }
    
    .animation-delay-400 {
        animation-delay: 0.4s;
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    .slider-dot.active {
        width: 2rem;
        opacity: 1;
    }
</style>
@endpush

@push('scripts')
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slider-dot');
    let autoSlideInterval;

    function showSlide(n) {
        // Remove active class from all slides and dots
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        // Wrap around if needed
        if (n >= slides.length) {
            currentSlide = 0;
        } else if (n < 0) {
            currentSlide = slides.length - 1;
        } else {
            currentSlide = n;
        }
        
        // Add active class to current slide and dot
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }

    function changeSlide(direction) {
        showSlide(currentSlide + direction);
        resetAutoSlide();
    }

    function goToSlide(n) {
        showSlide(n);
        resetAutoSlide();
    }

    function autoSlide() {
        changeSlide(1);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(autoSlide, 5000); // Change slide every 5 seconds
    }

    // Initialize slider
    showSlide(0);
    resetAutoSlide();

    // Pause auto-slide on hover
    const heroSlider = document.getElementById('heroSlider');
    heroSlider.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });
    
    heroSlider.addEventListener('mouseleave', () => {
        resetAutoSlide();
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            changeSlide(-1);
        } else if (e.key === 'ArrowRight') {
            changeSlide(1);
        }
    });
</script>
@endpush
