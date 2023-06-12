<?php

namespace App\Http\Controllers;

use App\Models\Export;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index(): View
    {
        $exports = Export::query()->paginate(12);
        return view('admin.export.index', ['exports' => $exports]);
    }
}
