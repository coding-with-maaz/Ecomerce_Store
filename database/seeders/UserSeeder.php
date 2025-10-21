<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@medfit.com',
            'password' => Hash::make('password'), // Change this
            'phone' => null,
            'address' => null,
            'city' => null,
            'postal_code' => null,
            'role' => 'admin',
        ]);

        // Real customer from database
        User::create([
            'id' => 2,
            'name' => 'Lopoloifhidwjdwfefee fjedwjdwj ijwhfwdj wfiefwjdwd hwidjwidhwfhwidjiwj hjfhefjhwifhewfiwejj hfiwhfqwjhfqwiefgwiej medzfitt.com',
            'email' => 'nomin.momin+155x1@mail.ru',
            'password' => Hash::make('password'),
            'phone' => '82263386781',
            'address' => '213 Rockwood Dr',
            'city' => 'Lopoloifhidwjdwfefee fjedwjdwj ijwhfwdj wfiefwjdwd hwidjwidhwfhwidjiwj hjfhefjhwifhewfiwejj hfiwhfqw',
            'postal_code' => '145341',
            'role' => 'customer',
        ]);
    }
}
