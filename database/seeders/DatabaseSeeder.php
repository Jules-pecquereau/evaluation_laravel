<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'title' => 'Administrator']);
        $techRole = Role::firstOrCreate(['name' => 'technician', 'title' => 'Technician']);

        // Create Abilities
        $manageNetworks = Ability::firstOrCreate(['name' => 'manage-networks', 'title' => 'Manage Networks']);
        $manageComputers = Ability::firstOrCreate(['name' => 'manage-computers', 'title' => 'Manage Computers']);
        $manageServers = Ability::firstOrCreate(['name' => 'manage-servers', 'title' => 'Manage Servers']);

        // Assign Abilities to Roles
        $adminRole->allow($manageNetworks);
        $techRole->allow($manageComputers);
        $techRole->allow($manageServers);

        // Create Admin User
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'Not24get',
        ]);
        $adminUser->assign('admin');

        // Create Technician User
        $techUser = User::factory()->create([
            'name' => 'Technician User',
            'email' => 'tech@example.com',
            'password' => 'Not24get',
        ]);
        $techUser->assign('technician');
    }
}
