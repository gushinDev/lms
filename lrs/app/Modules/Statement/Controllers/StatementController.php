<?php

namespace App\Modules\Statement\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Statement\Models\Statement;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function index()
    {
        $statements = Statement::query()->simplePaginate();

        return view('statements', compact('statements'));

    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }
}
