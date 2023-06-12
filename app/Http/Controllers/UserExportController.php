<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserExportRequest;
use App\Jobs\ExportJob;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class UserExportController extends Controller
{
    public function export(UserExportRequest $request): RedirectResponse
    {
        ExportJob::dispatch($request->getExportFileType());
        return redirect()->route('users.index')->with('success', 'ExportJob has been started.');
    }
}
