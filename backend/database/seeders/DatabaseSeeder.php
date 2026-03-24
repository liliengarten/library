<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@library.ru',
            'password' => 'Admin123',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Reader',
            'surname' => 'Reader',
            'email' => 'user@library.ru',
            'password' => 'password',
            'role' => 'reader'
        ]);
    }
}
