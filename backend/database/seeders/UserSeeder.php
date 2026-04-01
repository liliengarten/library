<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@library.ru'],
            [
            'name' => 'Admin',
            'surname' => 'Admin',
            'password' => 'Admin123',
            'role' => 'admin'
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@library.ru'],
            [
                'name' => 'Reader',
                'surname' => 'Reader',
                'password' => 'password',
                'role' => 'reader'
            ]
        );
    }
}
