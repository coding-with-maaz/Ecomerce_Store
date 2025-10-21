<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Order 1
        $order1 = Order::create([
            'id' => 3,
            'user_id' => null,
            'order_number' => 'ORD20250903FE89FF',
            'status' => 'pending',
            'subtotal' => 2000.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 2000.00,
            'shipping_address' => "Shop no 4 Al Madina Carpet centre Shah wali market dargai bazar\nDargai",
            'billing_address' => "Ibrahim Ibrahim\nShop no 4 Al Madina Carpet centre Shah wali market dargai bazar\nDargai\nDargai, 23020\n03329003048\nbehlulkhan35@gmail.com",
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-09-03 11:08:12',
            'updated_at' => '2025-09-03 11:08:12',
        ]);
        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => 2,
            'product_name' => 'Top Tex Customized Lab Coat Step into professionalism',
            'product_sku' => 'Sk02',
            'quantity' => 1,
            'unit_price' => 2000.00,
            'total_price' => 2000.00,
            'variant_details' => null,
        ]);

        // Order 2
        $order2 = Order::create([
            'id' => 4,
            'user_id' => null,
            'order_number' => 'ORD2025090367814B',
            'status' => 'pending',
            'subtotal' => 3500.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 3500.00,
            'shipping_address' => "Shop no 4 Al Madina Carpet centre Shah wali market dargai bazar\nDargai",
            'billing_address' => "Ibrahim Ibrahim\nShop no 4 Al Madina Carpet centre Shah wali market dargai bazar\nDargai\nDargai, 23020\n03329003048\nbehlulkhan35@gmail.com",
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-09-03 12:48:37',
            'updated_at' => '2025-09-03 12:48:37',
        ]);
        OrderItem::create([
            'order_id' => $order2->id,
            'product_id' => 5,
            'product_name' => 'Premium Soft Weavix Medical Scrubs',
            'product_sku' => 'Sk05',
            'quantity' => 1,
            'unit_price' => 3500.00,
            'total_price' => 3500.00,
            'variant_details' => null,
        ]);

        // Order 3
        $order3 = Order::create([
            'id' => 5,
            'user_id' => 1,
            'order_number' => 'ORD20250903FF6F45',
            'status' => 'pending',
            'subtotal' => 5500.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 5500.00,
            'shipping_address' => "Shop no 4 Al Madina Carpet centre Shah wali market dargai bazar\nDargai",
            'billing_address' => "Ibrahim Ibrahim\nShop no 4 Al Madina Carpet centre Shah wali market dargai bazar\nDargai\nDargai, 23020\n03329003048\nadmin@medfit.com",
            'payment_method' => 'bank_transfer',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-09-03 18:44:48',
            'updated_at' => '2025-09-03 18:44:48',
        ]);
        OrderItem::create([
            'order_id' => $order3->id,
            'product_id' => 4,
            'product_name' => 'Medzfitt Premium Soft Weavix Medical Scrubs',
            'product_sku' => 'Sk04',
            'quantity' => 1,
            'unit_price' => 3500.00,
            'total_price' => 3500.00,
            'variant_details' => null,
        ]);
        OrderItem::create([
            'order_id' => $order3->id,
            'product_id' => 2,
            'product_name' => 'Top Tex Customized Lab Coat Step into professionalism',
            'product_sku' => 'Sk02',
            'quantity' => 1,
            'unit_price' => 2000.00,
            'total_price' => 2000.00,
            'variant_details' => null,
        ]);

        // Order 4
        $order4 = Order::create([
            'id' => 6,
            'user_id' => 1,
            'order_number' => 'ORD20250903E805A9',
            'status' => 'pending',
            'subtotal' => 3500.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 3500.00,
            'shipping_address' => "Shop no 4 Al Madina Carpet centre Shah wali market dargai bazar\nDargai",
            'billing_address' => "Ibrahim Ibrahim\nShop no 4 Al Madina Carpet centre Shah wali market dargai bazar\nDargai\nDargai, 23020\n03329003048\nadmin@medfit.com",
            'payment_method' => 'credit_card',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-09-03 18:46:27',
            'updated_at' => '2025-09-03 18:46:27',
        ]);
        OrderItem::create([
            'order_id' => $order4->id,
            'product_id' => 5,
            'product_name' => 'Premium Soft Weavix Medical Scrubs',
            'product_sku' => 'Sk05',
            'quantity' => 1,
            'unit_price' => 3500.00,
            'total_price' => 3500.00,
            'variant_details' => null,
        ]);

        // Order 5
        $order5 = Order::create([
            'id' => 7,
            'user_id' => null,
            'order_number' => 'ORD20250915228625',
            'status' => 'delivered',
            'subtotal' => 2000.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 2000.00,
            'shipping_address' => "Al hamd town near Indus public school jampur ",
            'billing_address' => "Kamran  Abdullah \nAl hamd town near Indus public school jampur \nJampur , 123456\n03356442539\nmairarani150@gmail.com",
            'payment_method' => 'cod',
            'payment_status' => 'paid',
            'notes' => '',
            'created_at' => '2025-09-15 16:25:20',
            'updated_at' => '2025-09-17 05:40:59',
        ]);
        OrderItem::create([
            'order_id' => $order5->id,
            'product_id' => 2,
            'product_name' => 'Top Tex Customized Lab Coat Step into professionalism',
            'product_sku' => 'Sk02',
            'quantity' => 1,
            'unit_price' => 2000.00,
            'total_price' => 2000.00,
            'variant_details' => null,
        ]);

        // Order 6
        $order6 = Order::create([
            'id' => 8,
            'user_id' => null,
            'order_number' => 'ORD202509170B31BC',
            'status' => 'pending',
            'subtotal' => 4000.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 4000.00,
            'shipping_address' => "Muhallah Cheema Aray wala chowk Aroop Gujranwala ",
            'billing_address' => "Mian Mateen Ahmad\nMuhallah Cheema Aray wala chowk Aroop Gujranwala \nGujranwala, 50250\n03446072099\npaka42947@gmail.com",
            'payment_method' => 'cod',
            'payment_status' => 'failed',
            'notes' => '',
            'created_at' => '2025-09-17 14:41:11',
            'updated_at' => '2025-09-17 14:58:24',
        ]);
        OrderItem::create([
            'order_id' => $order6->id,
            'product_id' => 7,
            'product_name' => 'Navy Blue - Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
            'product_sku' => 'Ski1122',
            'quantity' => 1,
            'unit_price' => 4000.00,
            'total_price' => 4000.00,
            'variant_details' => null,
        ]);

        // Order 7
        $order7 = Order::create([
            'id' => 9,
            'user_id' => null,
            'order_number' => 'ORD20250919F419DC',
            'status' => 'cancelled',
            'subtotal' => 7000.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 7000.00,
            'shipping_address' => "Street 7 Faisal colony Gulzar Quaid Rawalpindi Al Khalid health care clanic ",
            'billing_address' => "Hamza khan Yousafzai\nStreet 7 Faisal colony Gulzar Quaid Rawalpindi Al Khalid health care clanic \nRawalpindi , 00666\n03145215762\nhamzakhanyousafzai63@gmail.com",
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-09-19 05:18:44',
            'updated_at' => '2025-09-23 10:08:57',
        ]);
        OrderItem::create([
            'order_id' => $order7->id,
            'product_id' => 1,
            'product_name' => 'Medical Scrub| Medzfitt Premium Weavix Scrubs',
            'product_sku' => 'Sk01',
            'quantity' => 2,
            'unit_price' => 3500.00,
            'total_price' => 7000.00,
            'variant_details' => null,
        ]);

        // Order 8
        $order8 = Order::create([
            'id' => 10,
            'user_id' => null,
            'order_number' => 'ORD2025092358BD00',
            'status' => 'shipped',
            'subtotal' => 4000.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 4000.00,
            'shipping_address' => "House # 21 Street 3-A Defence colony AQ Khan Rd Rwp",
            'billing_address' => "Sheharyar  Khan\nHouse # 21 Street 3-A Defence colony AQ Khan Rd Rwp\nRwp, 44000\n03320412848\nshaharyarkhan460@gmail.com",
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-09-23 09:51:33',
            'updated_at' => '2025-09-23 10:08:43',
        ]);
        OrderItem::create([
            'order_id' => $order8->id,
            'product_id' => 7,
            'product_name' => 'Navy Blue - Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
            'product_sku' => 'Ski1122',
            'quantity' => 1,
            'unit_price' => 4000.00,
            'total_price' => 4000.00,
            'variant_details' => null,
        ]);

        // Order 9
        $order9 = Order::create([
            'id' => 11,
            'user_id' => null,
            'order_number' => 'ORD20250929D9F878',
            'status' => 'shipped',
            'subtotal' => 4000.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 4000.00,
            'shipping_address' => "Mustakim Mashal Khan House in street next to Makkah Medicos near Bacha Khan Medical Complex Shamansoor",
            'billing_address' => "Atta Inayat\nMustakim Mashal Khan House in street next to Makkah Medicos near Bacha Khan Medical Complex Shamansoor\nSwabi, 23610\n03409326814\nhealthhero4@gmail.com",
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-09-29 15:19:52',
            'updated_at' => '2025-09-30 16:27:26',
        ]);
        OrderItem::create([
            'order_id' => $order9->id,
            'product_id' => 7,
            'product_name' => 'Navy Blue - Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
            'product_sku' => 'Ski1122',
            'quantity' => 1,
            'unit_price' => 4000.00,
            'total_price' => 4000.00,
            'variant_details' => null,
        ]);

        // Order 10
        $order10 = Order::create([
            'id' => 12,
            'user_id' => null,
            'order_number' => 'ORD20251001BDDA6F',
            'status' => 'cancelled',
            'subtotal' => 4000.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 4000.00,
            'shipping_address' => "Village Minaki Banda tahsil Tekht-e-Nasrati District Karak ",
            'billing_address' => "Muhammad  Saqib\nVillage Minaki Banda tahsil Tekht-e-Nasrati District Karak \nKarak, 24700\n03459030796\nsaqibktk0345@gmail.com",
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-10-01 10:18:01',
            'updated_at' => '2025-10-01 18:30:36',
        ]);
        OrderItem::create([
            'order_id' => $order10->id,
            'product_id' => 7,
            'product_name' => 'Navy Blue - Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
            'product_sku' => 'Ski1122',
            'quantity' => 1,
            'unit_price' => 4000.00,
            'total_price' => 4000.00,
            'variant_details' => null,
        ]);

        // Order 11
        $order11 = Order::create([
            'id' => 13,
            'user_id' => null,
            'order_number' => 'ORD20251006771084',
            'status' => 'shipped',
            'subtotal' => 4000.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 4000.00,
            'shipping_address' => "Akakhel medical complex city branch shamansoor",
            'billing_address' => "Habib Ullah\nAkakhel medical complex city branch shamansoor\nSwabi, 23610\n03120995676\nhabibullah95676@gmail.com",
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-10-06 15:05:00',
            'updated_at' => '2025-10-07 17:59:36',
        ]);
        OrderItem::create([
            'order_id' => $order11->id,
            'product_id' => 7,
            'product_name' => 'Navy Blue - Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
            'product_sku' => 'Ski1122',
            'quantity' => 1,
            'unit_price' => 4000.00,
            'total_price' => 4000.00,
            'variant_details' => null,
        ]);

        // Order 12
        $order12 = Order::create([
            'id' => 14,
            'user_id' => null,
            'order_number' => 'ORD20251016E2EFEA',
            'status' => 'shipped',
            'subtotal' => 4000.00,
            'tax_amount' => 0.00,
            'shipping_amount' => 0.00,
            'total_amount' => 4000.00,
            'shipping_address' => "Student boys hostel near rim jhim shadi Hal larkana ",
            'billing_address' => "Sheeraz Hussain Junejo\nStudent boys hostel near rim jhim shadi Hal larkana \nLarkana, 700\n03337505461\nsheerazjaam@gmail.con",
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'notes' => '',
            'created_at' => '2025-10-16 20:18:43',
            'updated_at' => '2025-10-19 06:24:47',
        ]);
        OrderItem::create([
            'order_id' => $order12->id,
            'product_id' => 7,
            'product_name' => 'Navy Blue - Medzfitt Stretchable Medical Scrub Set – Cargo Trousers & Shirt',
            'product_sku' => 'Ski1122',
            'quantity' => 1,
            'unit_price' => 4000.00,
            'total_price' => 4000.00,
            'variant_details' => null,
        ]);
    }
}

