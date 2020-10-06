<?php

namespace LaravelScaffold\Traits;

use LaravelScaffold\Models\Image;
use LaravelScaffold\Traits\ImageFunctionality;

trait HasImage
{
    use ImageFunctionality;

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
