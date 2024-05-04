<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'login' => 'adminadmin',
            'name' => 'Иванов Иван Иванович',
            'phone' => '+7(999)-999-99-99',
            'email' => 'test@example.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);
    }
}
