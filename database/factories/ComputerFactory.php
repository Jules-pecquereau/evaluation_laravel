<?php

namespace Database\Factories;

use App\Models\Network;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => $this->faker->unique()->bothify('SN-#####-?????'),
            'model' => $this->faker->word . ' ' . $this->faker->randomNumber(3),
            'brand' => $this->faker->company,
            'commissioned_at' => $this->faker->date(),
            'network_id' => Network::factory(),
        ];
    }
}
