<?php

namespace Database\Factories;

use App\Models\Network;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ip_address' => $this->faker->ipv4,
            'type' => $this->faker->randomElement(['Web', 'Database', 'Mail', 'File']),
            'os' => $this->faker->randomElement(['Ubuntu', 'CentOS', 'Windows Server', 'Debian']),
            'network_id' => Network::factory(),
        ];
    }
}
