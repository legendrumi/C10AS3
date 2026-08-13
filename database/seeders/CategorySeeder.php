<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Smartphones', 'name_tm' => 'Smartfonlar', 'name_ru' => 'Смартфоны'],
            ['name' => 'Laptops', 'name_tm' => 'Noutbuklar', 'name_ru' => 'Ноутбуки'],
            ['name' => 'Audio', 'name_tm' => 'Audio enjamlar', 'name_ru' => 'Аудио'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'name_tm' => $category['name_tm'],
                'name_ru' => $category['name_ru'],
            ]);
        }
    }
}