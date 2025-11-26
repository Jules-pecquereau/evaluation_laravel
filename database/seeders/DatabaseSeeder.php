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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Small example: create roles & abilities and assign to the test user
        $user = User::first();

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);

        $editArticles = Ability::firstOrCreate(['name' => 'edit-articles']);

        // Assign role & ability
        $user->assign($admin);
        $user->assign($editor);
        $user->allow($editArticles);
    }
}
