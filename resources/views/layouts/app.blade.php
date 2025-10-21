<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Medzfitt - Premium Medical Wear')</title>
    <meta name="description" content="@yield('meta_description', 'Premium medical wear and scrubs for healthcare professionals')">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#1e40af',
                        'primary-dark': '#1e3a8a',
                    }
                }
            }
        }
    </script>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-gray-800 text-white text-sm py-2">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="tel:03281662433" class="flex items-center hover:text-gray-300">
                    <i class="fas fa-phone mr-2"></i>
                    03281662433
                </a>
                <a href="mailto:info.medzfitt@gmail.com" class="flex items-center hover:text-gray-300">
                    <i class="fas fa-envelope mr-2"></i>
                    info.medzfitt@gmail.com
                </a>
            </div>
            <div class="flex items-center">
                <i class="fas fa-map-marker-alt mr-2"></i>
                <span>Sikandri Plaza, Park Rd, Chatta Bakhtawar, Islamabad, 45500</span>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <div class="text-2xl font-bold text-blue-600">
                        <span class="text-blue-800">Medz</span><span class="text-blue-600">fitt</span>
                    </div>
                </a>
                
                <!-- Search Bar -->
                <div class="flex-1 max-w-xl mx-8">
                    <form action="{{ route('products.search') }}" method="GET" class="relative">
                        <input 
                            type="text" 
                            name="q" 
                            placeholder="Search products..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                        >
                        <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-800 text-white px-4 py-1.5 rounded-md hover:bg-blue-900">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Right Menu -->
                <div class="flex items-center space-x-6">
                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}" class="relative hover:text-blue-600">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                    </a>
                    
                    <!-- Login/Register -->
                    @guest
                        <a href="{{ route('login') }}" class="bg-blue-800 text-white px-6 py-2 rounded-lg hover:bg-blue-900 transition">
                            Login / Register
                        </a>
                    @else
                        <div class="relative group">
                            <button class="flex items-center space-x-2 hover:text-blue-600">
                                <i class="fas fa-user-circle text-2xl"></i>
                                <span>{{ auth()->user()->name }}</span>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block">
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                        <i class="fas fa-dashboard mr-2"></i> Admin Dashboard
                                    </a>
                                @endif
                                <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    <i class="fas fa-box mr-2"></i> My Orders
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>

            <!-- Category Navigation -->
            <div class="border-t">
                <div class="flex items-center justify-center space-x-8 py-3">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                    <a href="{{ route('products.category', 'washing-wear-scrub-for-men') }}" class="text-gray-700 hover:text-blue-600 font-medium">Men</a>
                    <a href="{{ route('products.category', 'washing-wear-scrub-for-women') }}" class="text-gray-700 hover:text-blue-600 font-medium">Women</a>
                    <a href="{{ route('products.category', 'lab-coats') }}" class="text-gray-700 hover:text-blue-600 font-medium">Lab Coats</a>
                    <a href="{{ route('products.category', 'accessories') }}" class="text-gray-700 hover:text-blue-600 font-medium">Accessories</a>
                    <a href="{{ route('products.category', 'made-to-measure') }}" class="text-gray-700 hover:text-blue-600 font-medium">Made to Measure</a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Best Deals</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-4 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 m-4 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Newsletter Section -->
    <div class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Stay Updated with Latest Offers</h2>
            <p class="text-gray-400 mb-6">Subscribe to our newsletter for exclusive deals, new arrivals, and healthcare tips</p>
            <div class="max-w-md mx-auto flex">
                <input type="email" placeholder="Enter your email address" class="flex-1 px-4 py-3 rounded-l-lg text-gray-800 focus:outline-none">
                <button class="bg-blue-600 px-6 py-3 rounded-r-lg hover:bg-blue-700 transition">
                    <i class="fas fa-paper-plane mr-2"></i> Subscribe
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-2xl font-bold mb-4">Medzfitt</h3>
                    <p class="text-gray-400 mb-4">Experience comfort and style with Medzfitt's high-quality medical wear designed for healthcare professionals.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Contact Us</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Best Deals</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Terms & Conditions</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Return Policy</a></li>
                    </ul>
                </div>

                <!-- Products -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Products</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Men</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Women</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Lab Coats</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Accessories</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white">Made to Measure</a></li>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Information</h3>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-600"></i>
                            <span>Sikandri Plaza, Park Rd, Chatta Bakhtawar, Islamabad, 45500</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-blue-600"></i>
                            <a href="tel:03281662433" class="hover:text-white">03281662433</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-blue-600"></i>
                            <a href="mailto:info.medzfitt@gmail.com" class="hover:text-white">info.medzfitt@gmail.com</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3 text-blue-600"></i>
                            <span>Working Hours:<br>Sunday-Friday: 10:00 AM - 8:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-700 pt-6 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Medzfitt. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
