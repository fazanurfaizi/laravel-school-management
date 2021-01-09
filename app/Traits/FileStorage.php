<?php

namespace App\Traits;

use Image; // Intervention Image
use App\Models\Files;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadFile;

trait FileStorage {

    /**
     * Store uploaded file
     *
     * @param   File    $entry
     * @param   UploadFile  $contents
     */
    public function storeUpload(UploadFile $file, $public = 'public', $disk = null, $file_name = null) {
        if(!$disk) {
            $disk = config('filesystems.default');
        }

        if(!$file_name) {
            $file_name = $this->hash;
        }

        Storage::disk($disk)->putFileAs($this->file_name, $file, $file_name, $public);

        $entry->updatePublicPaths($disk);
    }

    /**
     * Store file to public directory
     *
     * @param   File    $entry
     * @param   UploadFile  $contents
     */
    public function storePublicUpload(UploadFile $file, $file_name = null) {
        $this->moveFile($file, 'public', 'public', $file_name);
    }

    /**
     * Store file to local directory
     *
     * @param   File    $entry
     * @param   UploadFile  $contents
     */
    public function storeLocalUpload(UploadFile $file, $file_name = null) {
        $this->moveFile($file, 'public', 'local', $file_name);
    }

}
