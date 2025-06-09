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
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            LocationSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ])->assignRole('customer');

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@example.com',
        ])->assignRole('Super Admin');

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Employee',
            'email' => 'employee@example.com',
        ])->assignRole('employee');
    
    }
}
