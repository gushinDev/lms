<?php

namespace App\Http\Controllers;

use App\Models\Export;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function index(): View
    {
        $exports = Export::query()->orderBy('export_id', 'desc')->paginate(15);
        return view('admin.export.index', ['exports' => $exports]);
    }

    public function download(Request $request)
    {
        $export = Export::find($request->export_id);
        return Storage::download($export->download_link);
    }
}
