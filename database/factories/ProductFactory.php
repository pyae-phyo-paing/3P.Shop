<?php

namespace Database\Factories;

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
            'code_no' => $this->faker->ean13,
            'name' => $this->faker->word,
            'price' => $this->faker->ean13,
            'discount' => $this->faker->ean8,
            'image' => $this->faker->imageUrl,
            'instock' =>$this->faker->numberBetween(0, 100),
            'description' => $this->faker->paragraph,
            'brand_id' =>rand(1,5),
            'category_id'=>rand(1,10),
        ];
    }
}
