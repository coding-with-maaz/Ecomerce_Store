<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'id' => 1, // Original ID: 14
                'name' => 'Medical Scrub| Medzfitt Premium Weavix Scrubs',
                'slug' => 'medical-scrub-medzfitt-premium-weavix-scrubs',
                'description' => '<p>Medzfitt Premium Soft Weavix Scrubs<br>Experience unmatched comfort and functionality with Medzfitt Premium Soft Weavix Scrubs. Crafted from ultra-soft, lightweight, and breathable fabric, these scrubs are designed for all-day wear without compromising on durability.</p><p>Fabric: Soft Weavix blend – lightweight, skin-friendly, and easy to wash &amp; wear.</p><p><strong>Design</strong>: Modern, professional fit with a smooth finish for all-day confidence.</p><p><strong>Storage</strong>: 3 spacious shirt pockets + 3 practical trouser pockets for maximum utility.<br>Perfect for healthcare professionals who value comfort, style, and convenience in every shift.</p>',
                'short_description' => '',
                'price' => 4000.00,
                'sale_price' => 3500.00,
                'sku' => 'Sk01',
                'stock_quantity' => 48,
                'category_id' => 1,
                'is_featured' => true,
                'is_active' => true,
                'video_file' => '',
                'video_embed' => '',
                'video_type' => 'file',
            ],
            [
                'id' => 2, // Original ID: 15
                'name' => 'Top Tex Customized Lab Coat Step into professionalism',
                'slug' => 'top-tex-customized-lab-coat-step-into-professionalism',
                'description' => '<p>Top Tex Customized Lab Coat<br>Step into professionalism with the Top Tex Customized Lab Coat – designed for comfort, durability, and a polished look. Made from high-quality fabric, this coat offers a crisp, clean finish that\'s perfect for daily wear. Personalize it with your name and logo for a truly professional touch.</p><p>Fabric: Premium Top Tex – durable, breathable, and easy-care.</p><p>Customization: Add your name &amp; logo for a personalized identity.</p><p>Design: Classic fit with 2 spacious front pockets and 1 handy pen pocket for everyday essentials.<br>&nbsp;</p>',
                'short_description' => '<p>Top Tex Customized Lab Coat</p>',
                'price' => 2500.00,
                'sale_price' => 2000.00,
                'sku' => 'Sk02',
                'stock_quantity' => 47,
                'category_id' => 3,
                'is_featured' => false,
                'is_active' => true,
                'video_file' => '',
                'video_embed' => '',
                'video_type' => 'file',
            ],
            [
                'id' => 3, // Original ID: 16
                'name' => 'Medical Scrub| Premium Soft Weavix Scrub',
                'slug' => 'medical-scrub-premium-soft-weavix-scrub',
                'description' => '<p>Medzfitt Premium Soft Weavix Scrubs<br>Experience unmatched comfort and functionality with Medzfitt Premium Soft Weavix Scrubs. Crafted from ultra-soft, lightweight, and breathable fabric, these scrubs are designed for all-day wear without compromising on durability.</p><p>Fabric: Soft Weavix blend – lightweight, skin-friendly, and easy to wash &amp; wear.</p><p>Design: Modern, professional fit with a smooth finish for all-day confidence.</p><p>Storage: 3 spacious shirt pockets + 3 practical trouser pockets for maximum utility.<br>&nbsp;</p>',
                'short_description' => '',
                'price' => 4000.00,
                'sale_price' => 3500.00,
                'sku' => 'Sk03',
                'stock_quantity' => 10,
                'category_id' => 1,
                'is_featured' => true,
                'is_active' => true,
                'video_file' => '',
                'video_embed' => '',
                'video_type' => 'file',
            ],
            [
                'id' => 4, // Original ID: 17
                'name' => 'Medzfitt Premium Soft Weavix Medical Scrubs',
                'slug' => 'medzfitt-premium-soft-weavix-medical-scrubs',
                'description' => '<p>Medzfitt Premium Soft Weavix Scrubs<br>Experience unmatched comfort and functionality with Medzfitt Premium Soft Weavix Scrubs. Crafted from ultra-soft, lightweight, and breathable fabric, these scrubs are designed for all-day wear without compromising on durability.</p><p>Fabric: Soft Weavix blend – lightweight, skin-friendly, and easy to wash &amp; wear.</p><p>Design: Modern, professional fit with a smooth finish for all-day confidence.</p><p>Storage: 3 spacious shirt pockets + 3 practical trouser pockets for maximum utility.</p>',
                'short_description' => '',
                'price' => 4000.00,
                'sale_price' => 3500.00,
                'sku' => 'Sk04',
                'stock_quantity' => 19,
                'category_id' => 1,
                'is_featured' => true,
                'is_active' => true,
                'video_file' => '',
                'video_embed' => '',
                'video_type' => 'file',
            ],
            [
                'id' => 5, // Original ID: 18
                'name' => 'Premium Soft Weavix Medical Scrubs',
                'slug' => 'premium-soft-weavix-medical-scrubs',
                'description' => '<p>Medzfitt Premium Soft Weavix Scrubs<br>Experience unmatched comfort and functionality with Medzfitt Premium Soft Weavix Scrubs. Crafted from ultra-soft, lightweight, and breathable fabric, these scrubs are designed for all-day wear without compromising on durability.</p><p>Fabric: Soft Weavix blend – lightweight, skin-friendly, and easy to wash &amp; wear.</p><p>Design: Modern, professional fit with a smooth finish for all-day confidence.</p><p>Storage: 3 spacious shirt pockets + 3 practical trouser pockets for maximum utility.</p>',
                'short_description' => '',
                'price' => 4000.00,
                'sale_price' => 3500.00,
                'sku' => 'Sk05',
                'stock_quantity' => 18,
                'category_id' => 1,
                'is_featured' => true,
                'is_active' => true,
                'video_file' => '',
                'video_embed' => '',
                'video_type' => 'file',
            ],
            [
                'id' => 6, // Original ID: 19
                'name' => 'Navy blue 8 pockets scrub',
                'slug' => 'navy-blue-8-pockets-scrub',
                'description' => '',
                'short_description' => '',
                'price' => 4500.00,
                'sale_price' => 4000.00,
                'sku' => 'Sk06',
                'stock_quantity' => 30,
                'category_id' => 1,
                'is_featured' => false,
                'is_active' => true,
                'video_file' => '',
                'video_embed' => '',
                'video_type' => 'file',
            ],
            [
                'id' => 7, // Original ID: 21
                'name' => 'Navy Blue - Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
                'slug' => 'navy-blue---medzfitt-stretchable-medical-scrub-set-cargo-trousers-shirt',
                'description' => '<p>Medzfitt Stretchable Medical Scrub Set – Cargo Trousers &amp; Shirt</p><p>Stay professional and comfortable with the Medzfitt Scrub Set, designed for healthcare professionals who need flexibility, storage, and style.</p><p>Cargo Trousers: 4 spacious utility pockets to carry essentials with ease.</p><p>Scrub Shirt: 3 functional pockets plus 1 dedicated pin pocket for pens and tools.</p><p>Premium Fabric: Soft, breathable spandex blend with 4-way stretch for unrestricted movement.</p><p>Durable &amp; Easy Care: Wrinkle-resistant, lightweight, and built to withstand long shifts.<br>&nbsp;</p>',
                'short_description' => '',
                'price' => 4500.00,
                'sale_price' => 4000.00,
                'sku' => 'Ski1122',
                'stock_quantity' => 24,
                'category_id' => 6,
                'is_featured' => true,
                'is_active' => true,
                'video_file' => 'assets/videos/product_21_1756981730.mp4',
                'video_embed' => '',
                'video_type' => 'file',
            ],
            [
                'id' => 8, // Original ID: 22
                'name' => 'Olive Green - Navy Blue - Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
                'slug' => 'olive-green---navy-blue---medzfitt-stretchable-medical-scrub-set-cargo-trousers-shirt',
                'description' => '<p>Medzfitt Stretchable Medical Scrub Set – Cargo Trousers &amp; Shirt</p><p>Stay professional and comfortable with the Medzfitt Scrub Set, designed for healthcare professionals who need flexibility, storage, and style.</p><p>Cargo Trousers: 4 spacious utility pockets to carry essentials with ease.</p><p>Scrub Shirt: 3 functional pockets plus 1 dedicated pin pocket for pens and tools.</p><p>Premium Fabric: Soft, breathable spandex blend with 4-way stretch for unrestricted movement.</p><p>Durable &amp; Easy Care: Wrinkle-resistant, lightweight, and built to withstand long shifts.<br>&nbsp;</p>',
                'short_description' => '',
                'price' => 4500.00,
                'sale_price' => 4000.00,
                'sku' => 'Sku0010',
                'stock_quantity' => 25,
                'category_id' => 6,
                'is_featured' => true,
                'is_active' => true,
                'video_file' => 'assets/videos/product_22_1757188905.mp4',
                'video_embed' => '',
                'video_type' => 'file',
            ],
            [
                'id' => 9, // Original ID: 23
                'name' => 'MedzFitt Women\'s Scrubs – Premium Washing Wear Collection',
                'slug' => 'medzfitt-women-s-scrubs-premium-washing-wear-collection',
                'description' => '<p>Experience comfort and style with MedzFitt Women\'s Scrubs, crafted from premium soft washing-wear fabric that keeps you looking fresh and professional all day. 💙</p><p>✨ Features:</p><p>Premium Quality Fabric – soft, breathable &amp; lightweight</p><p>Washing Wear Material – easy-care, wrinkle-resistant &amp; durable</p><p>Perfect Tailored Fit – smart V-neck top with easy-fit straight pants</p><p>Lightweight Comfort – ideal for long shifts and everyday wear</p><p>Elegant Professional Look – designed to move with confidence</p>',
                'short_description' => '',
                'price' => 4000.00,
                'sale_price' => 3500.00,
                'sku' => '0012',
                'stock_quantity' => 200,
                'category_id' => 2,
                'is_featured' => true,
                'is_active' => true,
                'video_file' => 'assets/videos/product_23_1761023432.mp4',
                'video_embed' => '',
                'video_type' => 'file',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
