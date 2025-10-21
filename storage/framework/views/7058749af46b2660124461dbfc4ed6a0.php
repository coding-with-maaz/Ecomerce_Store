

<?php $__env->startSection('title', $product->name . ' - Medzfitt'); ?>

<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
<div class="bg-gray-50 py-6 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-2 text-sm text-gray-600">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-blue-600 transition">
                <i class="fas fa-home"></i> Home
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="<?php echo e(route('products.index')); ?>" class="hover:text-blue-600 transition">Products</a>
            <?php if($product->category): ?>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="<?php echo e(route('products.category', $product->category->slug)); ?>" class="hover:text-blue-600 transition">
                    <?php echo e($product->category->name); ?>

                </a>
            <?php endif; ?>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-900 font-semibold"><?php echo e(Str::limit($product->name, 40)); ?></span>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="relative bg-gray-50 rounded-2xl overflow-hidden shadow-xl" style="height: 600px;">
                    <?php if($product->primaryImage && file_exists(public_path($product->primaryImage->image_path))): ?>
                        <img id="mainImage" 
                             src="<?php echo e(asset($product->primaryImage->image_path)); ?>" 
                             alt="<?php echo e($product->name); ?>" 
                             class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                            <div class="text-center">
                                <i class="fas fa-tshirt text-9xl text-gray-400 mb-6"></i>
                                <p class="text-gray-500 font-bold text-2xl px-8"><?php echo e($product->name); ?></p>
                                <p class="text-gray-400 mt-4 text-lg">Image Coming Soon</p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Badges -->
                    <div class="absolute top-6 left-6 flex flex-col gap-3">
                        <?php if($product->sale_price): ?>
                            <span class="bg-red-600 text-white text-sm font-bold px-5 py-2.5 rounded-full shadow-xl">
                                SAVE <?php echo e($product->discount_percentage); ?>%
                            </span>
                        <?php endif; ?>
                        <?php if($product->is_featured): ?>
                            <span class="bg-yellow-500 text-white text-sm font-bold px-5 py-2.5 rounded-full shadow-xl">
                                <i class="fas fa-star"></i> FEATURED
                            </span>
                        <?php endif; ?>
                        <?php if($product->stock_quantity > 0 && $product->stock_quantity <= 10): ?>
                            <span class="bg-orange-500 text-white text-sm font-bold px-5 py-2.5 rounded-full shadow-xl">
                                <i class="fas fa-exclamation-circle"></i> LOW STOCK
                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- Wishlist Button -->
                    <button class="absolute top-6 right-6 w-14 h-14 bg-white rounded-full shadow-xl flex items-center justify-center hover:bg-red-50 transition group">
                        <i class="far fa-heart text-2xl text-gray-600 group-hover:text-red-600 group-hover:fas transition"></i>
                    </button>
                </div>

                <!-- Thumbnail Images -->
                <?php if($product->images->count() > 1): ?>
                    <div class="grid grid-cols-4 gap-4">
                        <?php $__currentLoopData = $product->images->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(file_exists(public_path($image->image_path))): ?>
                                <button onclick="changeImage('<?php echo e(asset($image->image_path)); ?>')" 
                                        class="relative bg-gray-50 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition border-2 border-transparent hover:border-blue-600 focus:border-blue-600" 
                                        style="height: 140px;">
                                    <img src="<?php echo e(asset($image->image_path)); ?>" 
                                         alt="<?php echo e($product->name); ?>" 
                                         class="w-full h-full object-cover">
                                </button>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Product Info -->
            <div class="space-y-6">
                <?php if($product->category): ?>
                    <div>
                        <a href="<?php echo e(route('products.category', $product->category->slug)); ?>" 
                           class="inline-block text-sm font-bold text-blue-600 hover:text-blue-700 uppercase tracking-wider">
                            <?php echo e($product->category->name); ?>

                        </a>
                    </div>
                <?php endif; ?>

                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight"><?php echo e($product->name); ?></h1>

                <!-- Rating & Reviews -->
                <div class="flex items-center gap-6 pb-6 border-b">
                    <div class="flex items-center">
                        <div class="flex text-yellow-400 text-xl">
                            <?php for($i = 0; $i < 5; $i++): ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <span class="ml-3 text-gray-700 font-semibold text-lg">5.0</span>
                    </div>
                    <div class="text-gray-600">
                        <i class="fas fa-comment-alt mr-2"></i>
                        <span class="font-semibold"><?php echo e($product->reviews->count()); ?></span> Reviews
                    </div>
                    <div class="text-gray-600">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        <span class="font-semibold">250+</span> Sold
                    </div>
                </div>

                <!-- Price -->
                <div class="py-6 border-b">
                    <?php if($product->sale_price): ?>
                        <div class="flex items-baseline gap-4 mb-3">
                            <span class="text-5xl font-bold text-blue-600">Rs.<?php echo e(number_format($product->sale_price, 0)); ?></span>
                            <span class="text-3xl text-gray-500 line-through">Rs.<?php echo e(number_format($product->price, 0)); ?></span>
                        </div>
                        <p class="text-green-600 font-semibold text-lg">
                            <i class="fas fa-tag mr-2"></i>
                            You save Rs.<?php echo e(number_format($product->price - $product->sale_price, 0)); ?> (<?php echo e($product->discount_percentage); ?>% off)
                        </p>
                    <?php else: ?>
                        <span class="text-5xl font-bold text-blue-600">Rs.<?php echo e(number_format($product->price, 0)); ?></span>
                    <?php endif; ?>
                </div>

                <!-- Stock Status -->
                <div class="py-6 border-b">
                    <?php if($product->stock_quantity > 0): ?>
                        <div class="flex items-center gap-3">
                            <div class="w-4 h-4 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-green-600 font-bold text-lg">In Stock</span>
                            <span class="text-gray-600">- <?php echo e($product->stock_quantity); ?> units available</span>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center gap-3">
                            <div class="w-4 h-4 bg-red-500 rounded-full"></div>
                            <span class="text-red-600 font-bold text-lg">Out of Stock</span>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Description -->
                <?php if($product->description): ?>
                    <div class="py-6 border-b">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Product Description</h3>
                        <p class="text-gray-700 leading-relaxed text-lg"><?php echo e($product->description); ?></p>
                    </div>
                <?php endif; ?>

                <!-- Product Variants -->
                <?php if($product->variants->count() > 0): ?>
                    <div class="py-6 border-b">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Available Variants</h3>
                        <div class="space-y-4">
                            <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-blue-50 transition border-2 border-transparent hover:border-blue-300">
                                    <div>
                                        <p class="font-bold text-gray-900"><?php echo e($variant->name); ?></p>
                                        <?php if($variant->sku): ?>
                                            <p class="text-sm text-gray-600 mt-1">SKU: <?php echo e($variant->sku); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-blue-600">Rs.<?php echo e(number_format($variant->price, 0)); ?></p>
                                        <?php if($variant->stock_quantity > 0): ?>
                                            <p class="text-sm text-green-600 font-semibold mt-1">
                                                <i class="fas fa-check-circle"></i> In Stock (<?php echo e($variant->stock_quantity); ?>)
                                            </p>
                                        <?php else: ?>
                                            <p class="text-sm text-red-600 font-semibold mt-1">
                                                <i class="fas fa-times-circle"></i> Out of Stock
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Quantity & Add to Cart -->
                <div class="py-6">
                    <div class="flex flex-wrap gap-4 items-center">
                        <!-- Quantity Selector -->
                        <div class="flex items-center">
                            <label class="text-gray-700 font-bold mr-4 text-lg">Quantity:</label>
                            <div class="flex items-center border-2 border-gray-300 rounded-xl overflow-hidden">
                                <button onclick="decreaseQty()" class="px-6 py-4 bg-gray-100 hover:bg-gray-200 transition font-bold text-xl">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" 
                                       id="quantity" 
                                       value="1" 
                                       min="1" 
                                       max="<?php echo e($product->stock_quantity); ?>" 
                                       class="w-20 text-center py-4 text-xl font-bold border-0 focus:outline-none">
                                <button onclick="increaseQty()" class="px-6 py-4 bg-gray-100 hover:bg-gray-200 transition font-bold text-xl">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Add to Cart Button -->
                        <?php if($product->stock_quantity > 0): ?>
                            <button class="flex-1 bg-blue-600 text-white px-10 py-5 rounded-xl font-bold text-lg hover:bg-blue-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <i class="fas fa-shopping-cart mr-3"></i> Add to Cart
                            </button>
                        <?php else: ?>
                            <button disabled class="flex-1 bg-gray-400 text-white px-10 py-5 rounded-xl font-bold text-lg cursor-not-allowed">
                                <i class="fas fa-times-circle mr-3"></i> Out of Stock
                            </button>
                        <?php endif; ?>

                        <!-- Buy Now Button -->
                        <?php if($product->stock_quantity > 0): ?>
                            <button class="flex-1 bg-green-600 text-white px-10 py-5 rounded-xl font-bold text-lg hover:bg-green-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <i class="fas fa-bolt mr-3"></i> Buy Now
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="grid grid-cols-2 gap-4 py-6 border-t">
                    <div class="flex items-center gap-3 p-4 bg-blue-50 rounded-xl">
                        <i class="fas fa-truck text-3xl text-blue-600"></i>
                        <div>
                            <p class="font-bold text-gray-900">Free Delivery</p>
                            <p class="text-sm text-gray-600">On orders over Rs.5,000</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-green-50 rounded-xl">
                        <i class="fas fa-undo text-3xl text-green-600"></i>
                        <div>
                            <p class="font-bold text-gray-900">Easy Returns</p>
                            <p class="text-sm text-gray-600">30-day return policy</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-purple-50 rounded-xl">
                        <i class="fas fa-shield-alt text-3xl text-purple-600"></i>
                        <div>
                            <p class="font-bold text-gray-900">Secure Payment</p>
                            <p class="text-sm text-gray-600">100% secure checkout</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-yellow-50 rounded-xl">
                        <i class="fas fa-headset text-3xl text-yellow-600"></i>
                        <div>
                            <p class="font-bold text-gray-900">24/7 Support</p>
                            <p class="text-sm text-gray-600">Dedicated customer care</p>
                        </div>
                    </div>
                </div>

                <!-- Share -->
                <div class="pt-6 border-t">
                    <p class="text-gray-700 font-bold mb-3 text-lg">Share this product:</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition shadow-md">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition shadow-md">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition shadow-md">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-pink-600 text-white rounded-full flex items-center justify-center hover:bg-pink-700 transition shadow-md">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <?php if($relatedProducts->count() > 0): ?>
            <div class="py-16 border-t">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">You May Also Like</h2>
                    <p class="text-gray-600 text-lg">Explore similar products that other customers loved</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="group">
                            <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2 border border-gray-100">
                                <div class="relative overflow-hidden bg-gray-100" style="height: 300px;">
                                    <?php if($related->primaryImage && file_exists(public_path($related->primaryImage->image_path))): ?>
                                        <img src="<?php echo e(asset($related->primaryImage->image_path)); ?>" 
                                             alt="<?php echo e($related->name); ?>" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                            <div class="text-center">
                                                <i class="fas fa-tshirt text-6xl text-gray-400 mb-3"></i>
                                                <p class="text-gray-500 font-semibold px-4 text-sm"><?php echo e(Str::limit($related->name, 25)); ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($related->sale_price): ?>
                                        <div class="absolute top-3 left-3">
                                            <span class="bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                                -<?php echo e($related->discount_percentage); ?>%
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                        <a href="<?php echo e(route('products.show', $related->slug)); ?>" 
                                           class="opacity-0 group-hover:opacity-100 bg-white text-gray-900 px-5 py-2.5 rounded-lg font-semibold transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 shadow-lg text-sm">
                                            <i class="fas fa-eye mr-1"></i> Quick View
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="p-5">
                                    <?php if($related->category): ?>
                                        <p class="text-xs text-blue-600 font-semibold mb-2 uppercase"><?php echo e($related->category->name); ?></p>
                                    <?php endif; ?>
                                    
                                    <h3 class="font-bold text-base mb-3 line-clamp-2 h-12 text-gray-900 group-hover:text-blue-600 transition-colors">
                                        <?php echo e($related->name); ?>

                                    </h3>
                                    
                                    <div class="flex items-center mb-3">
                                        <div class="flex text-yellow-400">
                                            <?php for($i = 0; $i < 5; $i++): ?>
                                                <i class="fas fa-star text-xs"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <span class="text-xs text-gray-500 ml-2">(5.0)</span>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <?php if($related->sale_price): ?>
                                            <div class="flex items-center space-x-2">
                                                <span class="text-xl font-bold text-blue-600">Rs.<?php echo e(number_format($related->sale_price, 0)); ?></span>
                                                <span class="text-sm text-gray-500 line-through">Rs.<?php echo e(number_format($related->price, 0)); ?></span>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-xl font-bold text-blue-600">Rs.<?php echo e(number_format($related->price, 0)); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <a href="<?php echo e(route('products.show', $related->slug)); ?>" 
                                       class="block w-full bg-blue-600 text-white text-center py-2.5 rounded-xl font-semibold hover:bg-blue-700 transition-all shadow-md hover:shadow-lg text-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    function changeImage(imageSrc) {
        document.getElementById('mainImage').src = imageSrc;
    }

    function increaseQty() {
        const input = document.getElementById('quantity');
        const max = parseInt(input.max);
        const current = parseInt(input.value);
        if (current < max) {
            input.value = current + 1;
        }
    }

    function decreaseQty() {
        const input = document.getElementById('quantity');
        const min = parseInt(input.min);
        const current = parseInt(input.value);
        if (current > min) {
            input.value = current - 1;
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\k\Desktop\moviebox\Ibrahim\medzfitt-laravel\resources\views/products/show.blade.php ENDPATH**/ ?>