

<?php $__env->startSection('title', $category->name . ' - Medzfitt'); ?>

<?php $__env->startSection('content'); ?>
<!-- Category Header -->
<div class="relative bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute transform rotate-45 -right-20 -top-20 w-96 h-96 bg-white rounded-full"></div>
        <div class="absolute transform rotate-45 -left-20 -bottom-20 w-96 h-96 bg-white rounded-full"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <!-- Category Icon/Image -->
            <?php if($category->image && file_exists(public_path($category->image))): ?>
                <div class="mb-6">
                    <img src="<?php echo e(asset($category->image)); ?>" alt="<?php echo e($category->name); ?>" class="w-24 h-24 object-cover rounded-2xl mx-auto shadow-2xl">
                </div>
            <?php else: ?>
                <div class="mb-6">
                    <div class="w-24 h-24 bg-white bg-opacity-20 rounded-2xl mx-auto flex items-center justify-center">
                        <i class="fas fa-th-large text-4xl"></i>
                    </div>
                </div>
            <?php endif; ?>
            
            <h1 class="text-5xl lg:text-6xl font-bold mb-4"><?php echo e($category->name); ?></h1>
            
            <?php if($category->description): ?>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed"><?php echo e($category->description); ?></p>
            <?php endif; ?>
            
            <div class="mt-6 flex items-center justify-center space-x-2 text-blue-100">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-white transition">Home</a>
                <i class="fas fa-chevron-right text-sm"></i>
                <a href="<?php echo e(route('products.index')); ?>" class="hover:text-white transition">Products</a>
                <i class="fas fa-chevron-right text-sm"></i>
                <span><?php echo e($category->name); ?></span>
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
                            <a href="<?php echo e(route('products.index')); ?>" class="flex items-center justify-between p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="flex items-center text-gray-700 group-hover:text-blue-600">
                                    <i class="fas fa-th mr-3"></i>
                                    All Products
                                </span>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600"></i>
                            </a>
                        </li>
                        <?php $__currentLoopData = \App\Models\Category::active()->ordered()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('products.category', $cat->slug)); ?>" 
                                   class="flex items-center justify-between p-3 rounded-lg transition group <?php echo e($cat->id === $category->id ? 'bg-blue-600 text-white' : 'hover:bg-blue-50'); ?>">
                                    <span class="<?php echo e($cat->id === $category->id ? 'text-white' : 'text-gray-700 group-hover:text-blue-600'); ?>">
                                        <?php echo e($cat->name); ?>

                                    </span>
                                    <i class="fas fa-chevron-right <?php echo e($cat->id === $category->id ? 'text-white' : 'text-gray-400 group-hover:text-blue-600'); ?>"></i>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <!-- Filter Section -->
                    <div class="mt-8 border-t pt-6">
                        <h4 class="font-bold text-lg mb-4 text-gray-900">Price Range</h4>
                        <form id="priceFilterForm" class="space-y-3">
                            <label class="flex items-center p-3 rounded-lg hover:bg-gray-50 cursor-pointer group">
                                <input type="checkbox" 
                                       name="price[]" 
                                       value="under-2000" 
                                       class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-600 price-filter"
                                       <?php echo e(in_array('under-2000', request('price', [])) ? 'checked' : ''); ?>>
                                <span class="ml-3 text-gray-700 group-hover:text-blue-600">Under Rs.2,000</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-gray-50 cursor-pointer group">
                                <input type="checkbox" 
                                       name="price[]" 
                                       value="2000-4000" 
                                       class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-600 price-filter"
                                       <?php echo e(in_array('2000-4000', request('price', [])) ? 'checked' : ''); ?>>
                                <span class="ml-3 text-gray-700 group-hover:text-blue-600">Rs.2,000 - Rs.4,000</span>
                            </label>
                            <label class="flex items-center p-3 rounded-lg hover:bg-gray-50 cursor-pointer group">
                                <input type="checkbox" 
                                       name="price[]" 
                                       value="above-4000" 
                                       class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-600 price-filter"
                                       <?php echo e(in_array('above-4000', request('price', [])) ? 'checked' : ''); ?>>
                                <span class="ml-3 text-gray-700 group-hover:text-blue-600">Above Rs.4,000</span>
                            </label>
                        </form>
                    </div>
                </div>
            </aside>

            <!-- Products Grid -->
            <div class="flex-1">
                <!-- Results Header -->
                <div class="flex flex-wrap justify-between items-center mb-8 bg-white rounded-2xl shadow-md p-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900"><?php echo e($category->name); ?> Products</h2>
                        <p class="text-gray-600 mt-1">Showing <span class="font-semibold"><?php echo e($products->count()); ?></span> of <span class="font-semibold"><?php echo e($products->total()); ?></span> products</p>
                    </div>
                    <div class="mt-4 lg:mt-0">
                        <select id="sortSelect" class="px-6 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-white">
                            <option value="latest" <?php echo e(request('sort') == 'latest' || !request('sort') ? 'selected' : ''); ?>>Sort by: Latest</option>
                            <option value="price-low" <?php echo e(request('sort') == 'price-low' ? 'selected' : ''); ?>>Price: Low to High</option>
                            <option value="price-high" <?php echo e(request('sort') == 'price-high' ? 'selected' : ''); ?>>Price: High to Low</option>
                            <option value="name" <?php echo e(request('sort') == 'name' ? 'selected' : ''); ?>>Name: A to Z</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="group">
                            <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                                <!-- Product Image -->
                                <div class="relative overflow-hidden bg-gray-100" style="height: 350px;">
                                    <?php if($product->primaryImage && file_exists(public_path($product->primaryImage->image_path))): ?>
                                        <img src="<?php echo e(asset($product->primaryImage->image_path)); ?>" 
                                             alt="<?php echo e($product->name); ?>" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                            <div class="text-center">
                                                <i class="fas fa-tshirt text-7xl text-gray-400 mb-4"></i>
                                                <p class="text-gray-500 font-semibold px-4"><?php echo e(Str::limit($product->name, 30)); ?></p>
                                                <p class="text-sm text-gray-400 mt-2">Image Coming Soon</p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <!-- Badges -->
                                    <div class="absolute top-4 left-4 flex flex-col gap-2">
                                        <?php if($product->sale_price): ?>
                                            <span class="bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">
                                                -<?php echo e($product->discount_percentage); ?>% OFF
                                            </span>
                                        <?php endif; ?>
                                        <?php if($product->is_featured): ?>
                                            <span class="bg-yellow-500 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">
                                                <i class="fas fa-star"></i> Featured
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Quick View -->
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                        <a href="<?php echo e(route('products.show', $product->slug)); ?>" 
                                           class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 shadow-lg">
                                            <i class="fas fa-eye mr-2"></i> Quick View
                                        </a>
                                    </div>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="p-6">
                                    <p class="text-xs text-blue-600 font-semibold mb-2 uppercase"><?php echo e($category->name); ?></p>
                                    
                                    <h3 class="font-bold text-lg mb-3 line-clamp-2 h-14 text-gray-900 group-hover:text-blue-600 transition-colors">
                                        <?php echo e($product->name); ?>

                                    </h3>
                                    
                                    <!-- Rating -->
                                    <div class="flex items-center mb-3">
                                        <div class="flex text-yellow-400">
                                            <?php for($i = 0; $i < 5; $i++): ?>
                                                <i class="fas fa-star text-sm"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <span class="text-sm text-gray-500 ml-2">(5.0)</span>
                                    </div>
                                    
                                    <!-- Price -->
                                    <div class="mb-4">
                                        <?php if($product->sale_price): ?>
                                            <div class="flex items-center space-x-3">
                                                <span class="text-2xl font-bold text-blue-600">Rs.<?php echo e(number_format($product->sale_price, 0)); ?></span>
                                                <span class="text-lg text-gray-500 line-through">Rs.<?php echo e(number_format($product->price, 0)); ?></span>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-2xl font-bold text-blue-600">Rs.<?php echo e(number_format($product->price, 0)); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Stock Status -->
                                    <?php if($product->stock_quantity > 0): ?>
                                        <p class="text-sm text-green-600 mb-4 flex items-center">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            <span class="font-semibold">In Stock</span>
                                        </p>
                                    <?php else: ?>
                                        <p class="text-sm text-red-600 mb-4 flex items-center">
                                            <i class="fas fa-times-circle mr-2"></i>
                                            <span class="font-semibold">Out of Stock</span>
                                        </p>
                                    <?php endif; ?>
                                    
                                    <!-- View Button -->
                                    <a href="<?php echo e(route('products.show', $product->slug)); ?>" 
                                       class="block w-full bg-blue-600 text-white text-center py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all shadow-md hover:shadow-lg">
                                        <i class="fas fa-shopping-cart mr-2"></i> View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-span-full">
                            <div class="bg-white rounded-2xl shadow-lg p-16 text-center">
                                <i class="fas fa-box-open text-8xl text-gray-300 mb-6"></i>
                                <h3 class="text-3xl font-bold text-gray-700 mb-4">No Products in this Category</h3>
                                <p class="text-gray-500 mb-8 text-lg">We're currently updating our inventory. Check back soon!</p>
                                <a href="<?php echo e(route('products.index')); ?>" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-lg">
                                    <i class="fas fa-th mr-2"></i> View All Products
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if($products->hasPages()): ?>
                    <div class="mt-12">
                        <div class="bg-white rounded-2xl shadow-md p-6">
                            <?php echo e($products->links()); ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle price filter changes
    document.querySelectorAll('.price-filter').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            applyFilters();
        });
    });

    // Handle sort changes
    document.getElementById('sortSelect').addEventListener('change', function() {
        applyFilters();
    });

    function applyFilters() {
        const url = new URL(window.location.href);
        const params = new URLSearchParams();

        // Get all checked price filters
        const checkedPrices = Array.from(document.querySelectorAll('.price-filter:checked'))
            .map(cb => cb.value);
        
        checkedPrices.forEach(price => {
            params.append('price[]', price);
        });

        // Get sort value
        const sortValue = document.getElementById('sortSelect').value;
        if (sortValue && sortValue !== 'latest') {
            params.set('sort', sortValue);
        }

        // Redirect with new parameters
        window.location.href = url.pathname + (params.toString() ? '?' + params.toString() : '');
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\k\Desktop\moviebox\Ibrahim\medzfitt-laravel\resources\views/products/category.blade.php ENDPATH**/ ?>