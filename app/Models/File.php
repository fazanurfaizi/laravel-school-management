<?php

namespace App\Models;

use App\Traits\HashesId;
use App\Traits\FileStorage;
use App\Jobs\ResizedImage;
use App\Observers\FileObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;
    use HashesId;
    use FileStorage;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'path',
        'file_name',
        'extension',
        'mime',
        'type',
        'public_path',
        'parent_id',
        'driver',
        'driver_data',
        'uploaded_by',
        'meta'
    ];

    protected $casts = [
        'id' => 'integer',
        'file_size' => 'integer',
        'user_id' => 'integer',
        'parent_id' => 'integer',
        'meta' => 'array',
        'permissions' => 'array'
    ];

    protected $hidden = [
        'meta',
        'file_name'
    ];

    protected $appends = [
        'sizes',
        'hash'
    ];

    public static function boot() {
        parent::boot();

        File::observe(FileObserver::class);
    }

    public function getSizesAttribute() {
        if($this->type == 'image') {
            return $this->getImageSizes();
        }

        return [];
    }

    public function children() {
        return $this->hasMany(static::class, 'folder_id');
    }

    public function parent() {
        return $this->belongsTo(static::class, 'folder_id');
    }

    public function uploader() {
        return $this->hasOne(User::class, 'id', 'uploaded_by');
    }

    public function setPermission($permission, $value) {
        $meta = $this->meta;
        $permissions = $meta['permissions'];
        $permissions[$permission] = $value;
        $meta['permissions'] = $permissions;
        $this->meta = $meta;
        return $this;
    }

    public function getPermission($permission = null) {
        $permissions = $this->meta['permissions'];

        if($permission !== null) {
            if(array_key_exists($permission, $permissions)) {
                return $permissions[$permission];
            } else {
                return false;
            }
        }

        return $permissions;
    }

    public function hasPermission($permission) {
        return $this->getPermission($permission) == true;
    }

    public setImageSize($size) {
        $sizes = $this->meta['sizes'];
        $sizes[$size] = false;

        $this->meta['sizes'] = $sizes;
        return $this;
    }

    public function getImageSizes() {
        return $this->meta['sizes'];
    }

    public function updatePublicPaths($driver = null) {
        if($this->driver !== $driver) {
            $this->driver = $driver;
        }

        if($this->hasPermission('public')) {
            $this->public_path = Storage::disk($this->driver)->url($this->getStoragePath());
        } else {
            $this->public_path = Storage::disk('local')->url($this->getStoragePath());
        }

        $this->save();
    }

    public function getStoragePath($prefix = null) {
        return "$this->file_name/$this->name";
    }

    /**
     * Set the image resize attributes.
     *
     * @param   array $sizes
     */
    public function setimageSizes(array $sizes) {
        $meta = $this->meta;
        $existing = $meta['sizes'];
        $hasNew = false;

        foreach ($sizes as $size) {
            if(is_array($size) && is_array($existing) && array_key_exists(implode('x', $size), $existing)) {
                continue;
            }

            $existing[implode('x', $size)] = false;
            $hasNew = true;
        }

        if($hasNew) {
            $meta['sizes'] = $existing;
            $this->meta = $meta;
            $this->save();
            ResizedImage::dispatch($this);
        }

        return $this;
    }

}
