<?php

namespace Database\Seeders;

use App\Modules\User\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'email' => 'admin@mail.ru',
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);
    }
}
