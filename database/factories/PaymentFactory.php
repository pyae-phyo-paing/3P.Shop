<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'payment_method' => $this->faker->creditCardType,
            'qty' => $this->faker->ean8,
            'total' => $this->faker->ean8,
            'status' => $this->faker->randomElement(['active','inactive','pending']),
            'product_size' => $this->faker->randomElement(['xl','M','L']),
            'payment_slip' => $this->faker->imageUrl,
            'address' => $this->faker->state,
            'note' => $this->faker->word,
            'user_id' =>rand(1,2),
            'product_id' =>rand(1,20),
        ];
    }
}
