<?php

namespace LaravelScaffold\Traits;

use LaravelScaffold\Models\Image;
use LaravelScaffold\Traits\ImageFunctionality;

trait HasImages
{
    use ImageFunctionality;

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
