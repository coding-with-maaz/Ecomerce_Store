<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $cartItems = [
            ['id' => 13, 'user_id' => null, 'session_id' => 'guest_68b87ec4caf481.36920570', 'product_id' => 5, 'quantity' => 1, 'variant_details' => null],
            ['id' => 16, 'user_id' => null, 'session_id' => 'guest_68c3986019f7a0.98315005', 'product_id' => 8, 'quantity' => 1, 'variant_details' => null],
            ['id' => 17, 'user_id' => null, 'session_id' => 'guest_68c3e0e4142927.35333198', 'product_id' => 7, 'quantity' => 1, 'variant_details' => null],
            ['id' => 18, 'user_id' => null, 'session_id' => 'guest_68c531ae576a85.27258189', 'product_id' => 6, 'quantity' => 1, 'variant_details' => null],
            ['id' => 20, 'user_id' => null, 'session_id' => 'guest_68c53509ece6d0.52924012', 'product_id' => 7, 'quantity' => 1, 'variant_details' => null],
            ['id' => 23, 'user_id' => null, 'session_id' => 'guest_68cc4e5cc773d7.06260787', 'product_id' => 2, 'quantity' => 1, 'variant_details' => null],
            ['id' => 26, 'user_id' => null, 'session_id' => 'guest_68cfeb0f7064a0.08885225', 'product_id' => 2, 'quantity' => 1, 'variant_details' => null],
            ['id' => 27, 'user_id' => null, 'session_id' => 'guest_68d1a151dd5942.38597679', 'product_id' => 7, 'quantity' => 1, 'variant_details' => null],
            ['id' => 30, 'user_id' => null, 'session_id' => 'guest_68d3e24fcaaea7.04573704', 'product_id' => 2, 'quantity' => 1, 'variant_details' => null],
            ['id' => 32, 'user_id' => null, 'session_id' => 'guest_68dc1b6e1219b3.56035514', 'product_id' => 8, 'quantity' => 1, 'variant_details' => null],
            ['id' => 36, 'user_id' => null, 'session_id' => 'guest_68dd641b44e3b4.81348362', 'product_id' => 1, 'quantity' => 1, 'variant_details' => null],
            ['id' => 37, 'user_id' => null, 'session_id' => 'guest_68ddd46bd87704.03376795', 'product_id' => 1, 'quantity' => 1, 'variant_details' => null],
            ['id' => 38, 'user_id' => null, 'session_id' => 'guest_68dea6853c2a90.00492910', 'product_id' => 8, 'quantity' => 1, 'variant_details' => null],
            ['id' => 39, 'user_id' => null, 'session_id' => 'guest_68df82127a5e37.79872408', 'product_id' => 8, 'quantity' => 1, 'variant_details' => null],
            ['id' => 41, 'user_id' => null, 'session_id' => 'guest_68e3f0df5e3d48.91449099', 'product_id' => 2, 'quantity' => 2, 'variant_details' => null],
            ['id' => 42, 'user_id' => null, 'session_id' => 'guest_68e424aecb5e93.27714883', 'product_id' => 7, 'quantity' => 1, 'variant_details' => null],
            ['id' => 43, 'user_id' => null, 'session_id' => 'guest_68e81d177d86a4.63612561', 'product_id' => 2, 'quantity' => 1, 'variant_details' => null],
            ['id' => 44, 'user_id' => null, 'session_id' => 'guest_68f0831c25b9c5.98131262', 'product_id' => 4, 'quantity' => 1, 'variant_details' => null],
        ];

        foreach ($cartItems as $item) {
            Cart::create($item);
        }
    }
}

