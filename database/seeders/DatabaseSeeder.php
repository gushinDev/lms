<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1000)->create();

//        \App\Models\User::factory()->create([
//            'username' => 'admin',
//            'email' => 'admin@example.com',
//            'password' => Hash::make('123')
//        ]);
    }
}
