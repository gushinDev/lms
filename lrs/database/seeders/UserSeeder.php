<?php

namespace Database\Seeders;

use App\Modules\User\Model\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();
    }
}
