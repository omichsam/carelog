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

        User::factory()->create([
            'name' => 'API Credentials',
            'email' => 'api@carelog.co.ke',
            'password' => bcrypt(config('app.api_password')),
        ]);

        User::factory()->create([
            'name' => 'Dr. Samson Michira',
            'email' => 'omichsam@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}