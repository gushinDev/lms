<?php

namespace Database\Seeders;

use App\Modules\Statement\Models\Statement;
use Illuminate\Database\Seeder;

class StatementSeeder extends Seeder
{

    public function run(): void
    {
        Statement::factory()->create(10);
    }
}
