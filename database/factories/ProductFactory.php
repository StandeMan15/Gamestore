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
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'ean_code' => $this->faker->ean8(),
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'price' => $this->faker->numberBetween(0,80),
            'discount_price' => $this->faker->numberBetween(0,80),
            'minimum_age' => $this->faker->numberBetween(12,18),
            'release_date' => $this->faker->date,
            'preorder_date' => $this->faker->date,
            'active' => $this->faker->boolean
        ];
    }
}
