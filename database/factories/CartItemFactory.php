<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cart = Cart::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();

        return [
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => fake()->numberBetween(1, 5),
        ];
    }
}