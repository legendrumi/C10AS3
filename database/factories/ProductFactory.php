<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::inRandomOrder()->first();
        $brand = Brand::inRandomOrder()->first();

        return [
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'name' => fake()->words(2, true),
            'name_tm' => fake()->words(2, true),
            'name_ru' => fake()->words(2, true),
            'price' => fake()->randomFloat(2, 49, 1500),
            'image' => null,
            'discount' => fake()->numberBetween(0, 15),
            'description' => fake()->paragraph(),
            'description_tm' => fake()->paragraph(),
            'description_ru' => fake()->paragraph(),
            'code' => fake()->unique()->ean13(),
        ];
    }
}