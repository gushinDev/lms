<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserExportRequest;
use App\Models\User;
use Carbon\Carbon;

class UserExportController extends Controller
{
    public function __construct()
    {

    }

    public function export(UserExportRequest $request)
    {
        $exportFileName = "./storage/export-{$request->getExportFileType()}-" . Carbon::now()->format('Y-m-d');
        ob_start();
        $users = User::query()->get(['user_id', 'username', 'email']);

        $df = fopen($exportFileName, 'w');
        fputcsv($df, ['user_id', 'username', 'email']);
        foreach ($users as $user) {
            fputcsv($df, $user->toArray());
        }
        fclose($df);
        ob_get_clean();
        return redirect()->route('users.index')->with('success', 'Export has been started.');
    }
}
