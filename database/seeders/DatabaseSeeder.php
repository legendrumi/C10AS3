<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            AdminSeeder::class,
            ProductSeeder::class,
        ]);

        Cart::factory()->count(5)->create();
        Wishlist::factory()->count(10)->create();

        CartItem::factory()->count(15)->create();
    }
}