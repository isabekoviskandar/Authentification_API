<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make(12345678),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make(12345678),
            'role' => 'user',
        ]);
        User::factory()->create([
            'name' => 'moderator',
            'email' => 'moderator@example.com',
            'password' => Hash::make(12345678),
            'role' => 'moderator',
        ]);

        $this->call([
            CatgeorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
