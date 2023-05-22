<?php

namespace Database\Seeders;

use App\Models\NavigationBar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationBarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NavigationBar::query()->create([
           'menu_item_name' => 'Панель навигации',
           'order_number' => 1000,
           'route_name' => 'navigation',
        ]);
    }
}
