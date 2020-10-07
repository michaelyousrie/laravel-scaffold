<?php

namespace LaravelScaffold\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function remove()
    {
        foreach ([storage_path($this->path), public_path($this->path), $this->path] as $path) {
            if (file_exists($path)) {
                unlink($path);
            }
        }

        return $this->delete();
    }
}
