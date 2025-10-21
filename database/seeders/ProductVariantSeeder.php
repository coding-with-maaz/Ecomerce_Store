<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        $variants = [
            // Product 1 (Original ID 14) - Colors
            ['product_id' => 1, 'variant_name' => 'color', 'variant_value' => 'Black, ', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            ['product_id' => 1, 'variant_name' => 'color', 'variant_value' => 'Navy blue ', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            ['product_id' => 1, 'variant_name' => 'color', 'variant_value' => 'Charcoal Grey ', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            ['product_id' => 1, 'variant_name' => 'color', 'variant_value' => 'Olive Green ', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            ['product_id' => 1, 'variant_name' => 'color', 'variant_value' => 'Light Grey ', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            ['product_id' => 1, 'variant_name' => 'color', 'variant_value' => 'Maroon ', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            // Product 1 - Sizes
            ['product_id' => 1, 'variant_name' => 'size', 'variant_value' => 'Small', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            ['product_id' => 1, 'variant_name' => 'size', 'variant_value' => 'Medium ', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            ['product_id' => 1, 'variant_name' => 'size', 'variant_value' => 'Large ', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            ['product_id' => 1, 'variant_name' => 'size', 'variant_value' => 'XL', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            
            // Product 2 (Original ID 15) - Lab Coat
            ['product_id' => 2, 'variant_name' => 'color', 'variant_value' => 'White', 'price_adjustment' => 0.00, 'stock_quantity' => 50],
            ['product_id' => 2, 'variant_name' => 'size', 'variant_value' => 'Small', 'price_adjustment' => 0.00, 'stock_quantity' => 50],
            ['product_id' => 2, 'variant_name' => 'size', 'variant_value' => 'Medium ', 'price_adjustment' => 0.00, 'stock_quantity' => 50],
            ['product_id' => 2, 'variant_name' => 'size', 'variant_value' => 'Large', 'price_adjustment' => 0.00, 'stock_quantity' => 50],
            ['product_id' => 2, 'variant_name' => 'size', 'variant_value' => 'Xl', 'price_adjustment' => 0.00, 'stock_quantity' => 50],
            ['product_id' => 2, 'variant_name' => 'size', 'variant_value' => '2xl', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            
            // Product 3 (Original ID 16)
            ['product_id' => 3, 'variant_name' => 'color', 'variant_value' => 'Maroon ', 'price_adjustment' => 0.00, 'stock_quantity' => 10],
            ['product_id' => 3, 'variant_name' => 'size', 'variant_value' => 'Small, Medium, Large, XL', 'price_adjustment' => 0.00, 'stock_quantity' => 20],
            
            // Product 4 (Original ID 17)
            ['product_id' => 4, 'variant_name' => 'color', 'variant_value' => 'White', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 4, 'variant_name' => 'size', 'variant_value' => 'Small', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 4, 'variant_name' => 'size', 'variant_value' => 'Medium ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 4, 'variant_name' => 'size', 'variant_value' => 'Large', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 4, 'variant_name' => 'size', 'variant_value' => 'Xl', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            
            // Product 5 (Original ID 18)
            ['product_id' => 5, 'variant_name' => 'color', 'variant_value' => 'Charcoal Grey ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 5, 'variant_name' => 'size', 'variant_value' => 'Xl', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 5, 'variant_name' => 'size', 'variant_value' => 'Large ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 5, 'variant_name' => 'size', 'variant_value' => 'Medium ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 5, 'variant_name' => 'size', 'variant_value' => 'Small', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 5, 'variant_name' => 'size', 'variant_value' => 'XL', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            
            // Product 7 (Original ID 21) - Navy Blue Scrub
            ['product_id' => 7, 'variant_name' => 'color', 'variant_value' => 'Navy blue ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 7, 'variant_name' => 'size', 'variant_value' => 'Small', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 7, 'variant_name' => 'size', 'variant_value' => 'Medium ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 7, 'variant_name' => 'size', 'variant_value' => 'Large', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 7, 'variant_name' => 'size', 'variant_value' => 'Xl', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 7, 'variant_name' => 'size', 'variant_value' => '2xl', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            
            // Product 8 (Original ID 22) - Olive Green Scrub
            ['product_id' => 8, 'variant_name' => 'color', 'variant_value' => 'Olive Green ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 8, 'variant_name' => 'size', 'variant_value' => 'Small', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 8, 'variant_name' => 'size', 'variant_value' => 'Medium ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 8, 'variant_name' => 'size', 'variant_value' => 'Large ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 8, 'variant_name' => 'size', 'variant_value' => 'Xl', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            
            // Product 9 (Original ID 23) - Women's Scrubs
            ['product_id' => 9, 'variant_name' => 'color', 'variant_value' => 'Navy Blue ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'color', 'variant_value' => 'Olive Green ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'color', 'variant_value' => 'Dark olive green ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'color', 'variant_value' => 'Black ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'color', 'variant_value' => 'Maroon', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'color', 'variant_value' => 'Dark maroon', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'color', 'variant_value' => 'Charcoal Grey ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'color', 'variant_value' => 'Light Grey ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'size', 'variant_value' => 'Small', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'size', 'variant_value' => 'Medium ', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'size', 'variant_value' => 'Large', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'size', 'variant_value' => 'XL', 'price_adjustment' => 0.00, 'stock_quantity' => 0],
            ['product_id' => 9, 'variant_name' => 'size', 'variant_value' => '2 XL', 'price_adjustment' => 3800.00, 'stock_quantity' => 10],
        ];

        foreach ($variants as $variant) {
            ProductVariant::create($variant);
        }
    }
}
