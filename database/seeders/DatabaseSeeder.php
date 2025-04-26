<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'API Credentials',
            'email' => config('app.api_email'),
            'password' => bcrypt(config('app.api_password')),
        ]);

        User::create([
            'name' => 'Dr. Samson Michira',
            'email' => 'omichsam@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}