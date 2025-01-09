<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voucher_no' => $this->faker->ean13,
            'total' => $this->faker->isbn10,
            'qty' => $this->faker->ean8,
            'payment_slip' => $this->faker->imageUrl,
            'status' => $this->faker->randomElement(['active','inactive','pending']),
            'address' => $this->faker->state,
            'note' => $this->faker->word,
            'product_id' =>rand(1,10),
            'user_id' =>rand(1,2),
            'payment_id' =>rand(1,10),
        ];
    }
}
