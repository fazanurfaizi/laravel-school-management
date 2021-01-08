<?php

namespace App\Jobs;

use App\Models\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File as FileAdapter;

class UploadToCloud implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $disk = config('filesystems.cloud');

        // File already uploaded
        if($this->file->driver == $disk) {
            return;
        }

        $path = storage_path('app/uploads/');
        $public = 'public';

        $localFiles = Storage::disk('local')->allFiles($this->file->file_name);

        foreach ($localFiles as $entry) {
            Storage::disk($disk)->putFileAs($this->file->file_name, new FileAdapter("{$path}/{$entry}"), $this->file->name, $public);
        }

        // Save to path;
        $this->file->updatePublicPath($disk);

        sleep(5);
        Storage::disk('local')->deleteDirectory($this->file->file_name);
    }
}
