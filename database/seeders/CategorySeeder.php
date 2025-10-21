<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Washing wear scrub for Men',
                'slug' => 'washing-wear-scrub-for-men',
                'description' => 'Soft Fabric lightweight premium quality stuff',
                'image' => 'assets/images/categories/68bc7f9e2bf42_20250906_233704.png',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Washing wear scrub for Women',
                'slug' => 'washing-wear-scrub-for-women',
                'description' => 'Soft fabric lightweight stuff premium quality',
                'image' => 'assets/images/categories/68bc807e77124_20250906_233925.png',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Lab Coats',
                'slug' => 'lab-coats',
                'description' => 'Professional lab coats',
                'image' => 'assets/images/categories/68bc81a0527bb_20250906_234502.png',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
                'description' => 'Medical accessories',
                'image' => 'assets/images/categories/68bc81ba13ae9_20250906_234632.png',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Strechtable Scrub',
                'slug' => 'strechtable-scrub',
                'description' => 'Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
                'image' => 'assets/images/categories/68bc7b6328a85_20250906_231947.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Strechtable Scrub Men\'s',
                'slug' => 'strechtable-scrub-men-s',
                'description' => 'Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
                'image' => 'assets/images/categories/68bc7e2cdaef7_20250906_233152.png',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Cotton Plus Polyester',
                'slug' => 'cotton-plus-polyester',
                'description' => 'Experience the perfect blend of comfort, durability, and functionality with our premium Cotton + Polyester Uniform Set.',
                'image' => null,
                'sort_order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

