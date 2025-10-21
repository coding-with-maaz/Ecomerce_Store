<?php

namespace Database\Seeders;

use App\Models\StoreLocation;
use Illuminate\Database\Seeder;

class StoreLocationSeeder extends Seeder
{
    public function run(): void
    {
        StoreLocation::create([
            'name' => 'Medzfitt',
            'address' => 'Sikandri Plaza, Park Rd, near Makhan Malai Restaurant, Chatta Bakhtawar, Islamabad, 45500',
            'phone' => '+923281662433',
            'email' => 'info.medzfitt@gmail.com',
            'city' => 'Islamabad',
            'is_active' => true,
            'sort_order' => 2,
        ]);
    }
}

