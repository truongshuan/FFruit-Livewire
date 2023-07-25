<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'customer_name' => $this->faker->name(),
            'customer_phone' => $this->faker->phoneNumber(),
            'customer_email' => $this->faker->email(),
            'shipping_address' => $this->faker->address(),
            'note' => $this->faker->text(100),
            'total_price' =>
            $this->faker->numberBetween(150000, 500000),
            'status' => $this->faker->randomElement(['0', '1', '2', '3']),
            'user_id' => User::all('id')->random(),
        ];
    }
}
