<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            // Product 1 (Original ID 14)
            ['product_id' => 1, 'image_path' => 'assets/images/products/product_68b80649cd7190.97467617.png', 'alt_text' => '1_20250903_135948_0000', 'sort_order' => 2, 'is_primary' => false],
            ['product_id' => 1, 'image_path' => 'assets/images/products/product_68b8064a437763.60272724.png', 'alt_text' => '2_20250903_135948_0001', 'sort_order' => 0, 'is_primary' => true],
            ['product_id' => 1, 'image_path' => 'assets/images/products/product_68b8064a93bb42.91139937.png', 'alt_text' => '3_20250903_135948_0002', 'sort_order' => 1, 'is_primary' => false],
            ['product_id' => 1, 'image_path' => 'assets/images/products/product_68b8064af13fc9.88348689.png', 'alt_text' => '4_20250903_135948_0003', 'sort_order' => 3, 'is_primary' => false],
            
            // Product 2 (Original ID 15 - Lab Coat)
            ['product_id' => 2, 'image_path' => 'assets/images/products/product_68b80b71239d56.30922365.png', 'alt_text' => '20250903_143044_0001', 'sort_order' => 1, 'is_primary' => false],
            ['product_id' => 2, 'image_path' => 'assets/images/products/product_68b80b717a2247.96518762.png', 'alt_text' => '20250903_143044_0002', 'sort_order' => 0, 'is_primary' => true],
            ['product_id' => 2, 'image_path' => 'assets/images/products/product_68b80b71beafc8.04852381.png', 'alt_text' => '20250903_143044_0003', 'sort_order' => 2, 'is_primary' => false],
            ['product_id' => 2, 'image_path' => 'assets/images/products/product_68b80b7208ca64.07821045.png', 'alt_text' => '20250903_143043_0000', 'sort_order' => 3, 'is_primary' => false],
            
            // Product 3 (Original ID 16)
            ['product_id' => 3, 'image_path' => 'assets/images/products/product_68b832c28e8ce3.81507588.png', 'alt_text' => '1_20250903_135948_0000', 'sort_order' => 0, 'is_primary' => true],
            
            // Product 4 (Original ID 17)
            ['product_id' => 4, 'image_path' => 'assets/images/products/product_68b830ffdd6653.15032746.png', 'alt_text' => '3_20250903_135948_0002', 'sort_order' => 0, 'is_primary' => true],
            
            // Product 5 (Original ID 18)
            ['product_id' => 5, 'image_path' => 'assets/images/products/product_68b83192dfb228.12734306.png', 'alt_text' => '4_20250903_135948_0003', 'sort_order' => 0, 'is_primary' => true],
            
            // Product 6 (Original ID 19)
            ['product_id' => 6, 'image_path' => 'assets/images/products/product_68b9689ac97ae7.91387762.png', 'alt_text' => '20250903_232640_0000', 'sort_order' => 0, 'is_primary' => true],
            
            // Product 7 (Original ID 21 - Navy Blue Scrub)
            ['product_id' => 7, 'image_path' => 'assets/images/products/product_68b969e1e3a9c5.07622581.png', 'alt_text' => '20250903_232640_0000', 'sort_order' => 0, 'is_primary' => true],
            
            // Product 8 (Original ID 22 - Olive Green Scrub)
            ['product_id' => 8, 'image_path' => 'assets/images/products/product_68bc9328473276.15036355.png', 'alt_text' => '20250907_005305_0000', 'sort_order' => 0, 'is_primary' => true],
            
            // Product 9 (Original ID 23 - Women's Scrubs)
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5bad3958b10.80044507.png', 'alt_text' => 'file_00000000917c62438f580d23bfd49ecf (1)', 'sort_order' => 7, 'is_primary' => false],
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5bad52e0b62.58487265.png', 'alt_text' => 'file_00000000102461fab9a81ad53c14b32f', 'sort_order' => 9, 'is_primary' => false],
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5bad6ef5e46.19260375.png', 'alt_text' => 'file_00000000ef80620694468908d3cb0180', 'sort_order' => 8, 'is_primary' => false],
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5bad88dba75.56169916.png', 'alt_text' => 'file_00000000ab8c61f6a7fe1e4222c3df0b', 'sort_order' => 0, 'is_primary' => true],
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5bada1ca7b5.30322293.png', 'alt_text' => 'file_00000000bdc461f8a71bc4350a17d3a1', 'sort_order' => 2, 'is_primary' => false],
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5badbbe8111.30220740.png', 'alt_text' => 'file_000000004c4861fab33f98470fe2a043', 'sort_order' => 3, 'is_primary' => false],
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5badd4052b0.28562665.png', 'alt_text' => 'file_00000000e100620db4a3876e6bbfc9dc', 'sort_order' => 1, 'is_primary' => false],
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5baded018a8.64177987.png', 'alt_text' => '120', 'sort_order' => 6, 'is_primary' => false],
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5badf4f2307.72239463.png', 'alt_text' => '170', 'sort_order' => 5, 'is_primary' => false],
            ['product_id' => 9, 'image_path' => 'assets/images/products/product_68f5badfc88210.53943527.jpg', 'alt_text' => 'IMG-20251009-WA0091', 'sort_order' => 4, 'is_primary' => false],
        ];

        foreach ($images as $image) {
            ProductImage::create($image);
        }
    }
}
