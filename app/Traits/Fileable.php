<?php

namespace App\Traits;

use App\Models\File;

trait Fileable {

    public function files() {
        return $this->morphToMany(File::class, 'fileable');
    }

}
