<?php

namespace App\Jobs;

use Image; // Intervention Image
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File as FileAdapter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ResizedImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * App\Models\File object
     *
     * @var App\Models\File
     */
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
        if($this->file->type !== 'image') {
            return;
        }

        // get sizes of images
        $meta = $this->file->meta;
        $sizes = $meta['sizes'];
        // There are not any sizes
        if(!is_array($sizes)) {
            return;
        }

        /*
         * is file in cloud storage then,
         * Download from cloud to local then resize it.
         */
        if($this->file->drive == config('filesystems.cloud')) {
            if (!Storage::disk(config('filesystems.cloud'))->exists($this->file->getStoragePath())) {
                throw new \Exception();
            }
            $s3File = Storage::disk(config('filesystems.cloud'))->get($this->file->getStoragePath());
            Storage::disk('local')->put("{$this->file->file_name}/{$this->file->name}", $s3File);
        }

        $path = storage_path("app/uploads/{$this->file->file_name}");
        $file = new FileAdapter("{$path}/{$this->file->name}");
        $public = 'public';

        foreach ($sizes as $key => $value) {
            // already we resized this size
            if($value == true) {
                continue;
            }

            $resize = explode('x', $key); // [150, 50]

            // create Intervention images
            $image = Image::make($file)->resize($resize[0], $resize[1]);

            $localFile = "{$path}/{$key}-{$this->file->name}";
            $image->save($localFile);

            if($this->file->driver == config('filesystems.cloud')) {
                Storage::disk(config('filesystems.cloud'))->putFileAs($this->file->file_name, new FileAdapter($localFile), "{$key}-{$this->file->file_name}", $public);
            }

            $sizes[$key] = true;
        }

        // Save meta value
        $meta['sizes'] = $sizes;
        $this->file->meta = $meta;
        if($this->file->isDirty) {
            $this->file->save();
        }

        if($this->file->driver == config('filesystems.cloud')) {
            Storage::deleteDirectory($path);
        }

    }
}
