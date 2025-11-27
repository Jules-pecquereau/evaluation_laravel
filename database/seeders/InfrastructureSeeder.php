<?php

namespace Database\Seeders;

use App\Models\Computer;
use App\Models\Network;
use App\Models\Server;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfrastructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 Networks
        $networks = Network::factory()->count(5)->create();

        foreach ($networks as $network) {
            // For each network, create 10 computers
            Computer::factory()->count(10)->create([
                'network_id' => $network->id,
            ]);

            // For each network, create 2 servers
            Server::factory()->count(2)->create([
                'network_id' => $network->id,
            ]);
        }
    }
}
