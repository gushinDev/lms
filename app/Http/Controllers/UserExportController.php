<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserExportRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class UserExportController extends Controller
{
    public function export(UserExportRequest $request): RedirectResponse
    {
        $exportFileName = "./storage/export-{$request->getExportFileType()}-" . Carbon::now()->format('Y-m-d');
        ob_start();
        $users = User::query()->get(['user_id', 'username', 'email']);

        $exportFile = fopen($exportFileName, 'w');
        fputcsv($exportFile, ['user_id', 'username', 'email']);
        foreach ($users as $user) {
            fputcsv($exportFile, $user->toArray());
        }
        fclose($exportFile);
        ob_get_clean();

        return redirect()->route('users.index')->with('success', 'Export has been started.');
    }
}
