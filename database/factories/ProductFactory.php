<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        return [
            'title' => fake()->name(),
            'price' => fake()->numberBetween(1000, 1000000),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl('640','480'),
            'category_id' => Category::factory(),
            'user_id' => User::factory()
        ];
    }
}
