<?php

namespace Database\Factories;

use App\Modules\Statement\Models\Statement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StatementFactory extends Factory
{
    protected $model = Statement::class;
    public function definition(): array
    {
        $verbs = [
            'experienced',
            'completed',
            'answered',
            'passed',
            'failed',
            'attempted',
        ];

        return [
            'actor' => fake()->safeEmail(),
            'verb' => $verbs[rand(0, count($verbs) - 1)],
            'object' => Str::uuid(),
        ];
    }
}
