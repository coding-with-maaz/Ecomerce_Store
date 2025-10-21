<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['setting_key' => 'site_name', 'setting_value' => 'Medzfitt'],
            ['setting_key' => 'site_description', 'setting_value' => 'Premium Medical Wear'],
            ['setting_key' => 'contact_email', 'setting_value' => 'info.medzfitt@gmail.com'],
            ['setting_key' => 'contact_phone', 'setting_value' => '03281662433'],
            ['setting_key' => 'address', 'setting_value' => 'Sikandri Plaza, Park Rd, Chatta Bakhtawar, Islamabad, 45500'],
            ['setting_key' => 'currency', 'setting_value' => 'PKR'],
            ['setting_key' => 'tax_rate', 'setting_value' => '0.00'],
            ['setting_key' => 'shipping_cost', 'setting_value' => '500'],
            ['setting_key' => 'shipping_enabled', 'setting_value' => '1'],
            ['setting_key' => 'free_shipping_threshold', 'setting_value' => '1000'],
            ['setting_key' => 'standard_shipping_cost', 'setting_value' => '150'],
            ['setting_key' => 'express_shipping_cost', 'setting_value' => '300'],
            ['setting_key' => 'tax_enabled', 'setting_value' => '1'],
            ['setting_key' => 'tax_inclusive', 'setting_value' => '0'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}

