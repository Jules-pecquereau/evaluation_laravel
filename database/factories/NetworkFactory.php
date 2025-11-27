<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Network>
 */
class NetworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => $this->faker->word . ' Network',
            'lan' => $this->faker->ipv4 . '/24',
            'is_out_of_service' => $this->faker->boolean(10), // 10% chance of being out of service
        ];
    }
}
