<?php

use App\Http\Controllers\MovieController;
use App\Modules\Statement\Controllers\StatementController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/ping', function () {
    $connection = DB::connection('mongodb');
//    dd($connection);
    $msg = 'gg';
    try {
        $connection->command(['ping' => 1]);
    } catch (Throwable $e) {
        $msg = 'No connection: ' . $e->getMessage();
    }

    return ['msg' => $msg];
});

Route::get('/browse_movies/', [MovieController::class, 'show']);
Route::get('/browse_movies/1', [MovieController::class, 'store']);
Route::get('/statements', [StatementController::class, 'index']);

