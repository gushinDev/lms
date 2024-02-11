<?php

namespace App\Console\Commands;

use App\Modules\Auth\Services\AuthService;
use App\Modules\Patterns\AppSingletone;
use App\Modules\Patterns\Builder\CarBuilder;
use Illuminate\Console\Command;

class Debug extends Command
{
    protected $signature = 'd';

    public function handle()
    {
        $x = ['f' => 1];
        dump($x['F']);
    }
}
