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
            'name' => 'Test User',
            'email' => 'user@user.com',
        ]);

        User::factory()->create([
            'name' => 'Ritesh',
            'email' =>'riteshthapa211@gmail.com',
            'password'=>bcrypt('Riteshthapa211@'),
            'is_admin' => 1
        ]);
    }
}
