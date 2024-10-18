<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash; // Import Hash untuk hashing password


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com', // Perbaiki format email
            'password' => Hash::make('12345678'), // Hash password
            'role' => 'admin',
        ]);
    }
}
