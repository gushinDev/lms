<?php

namespace App\Jobs;

use App\Models\Export;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ExportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected const CHUNK_SIZE = 50;
    protected int $currentPoint = 0;
    protected array $exportData = [];

    public function __construct(readonly protected string $fileType)
    {
        $exportFileName = "{$this->fileType}-" . Carbon::now()->format('Y-m-d H:m:s');
        $export = Export::create([
            'export_type' => 'Users',
            'file_name' => $exportFileName,
            'progress' => $this->currentPoint,
            'download_link' => "exports/users/{$exportFileName}.csv"
        ]);

        $this->exportData = [
            'file_name' => $exportFileName,
            'export_id' => $export->getKey()
        ];
    }

    public function handle(): void
    {
        ob_start();
        $exportFilePath = storage_path("/app/exports/users/{$this->exportData['file_name']}.csv");
        $exportFile = fopen($exportFilePath, 'w');

        $allUsersCount = User::query()->count();

        User::query()->select(['user_id', 'username', 'email'])->chunk(self::CHUNK_SIZE, function ($usersChunk) use ($exportFile, $allUsersCount) {
            foreach ($usersChunk as $user) {
                fputcsv($exportFile, $user->toArray());
            }

            $this->currentPoint += floor($usersChunk->count() / $allUsersCount * 100);
        });

        Export::query()->where('export_id', $this->exportData['export_id'])->update(['progress' => 100]);
        fclose($exportFile);
        ob_get_clean();
    }
}
