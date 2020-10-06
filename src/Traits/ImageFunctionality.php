<?php

namespace LaravelScaffold\Traits;

use Illuminate\Http\UploadedFile;
use LaravelScaffold\Models\Image;
use LaravelScaffold\Helpers\FileUploader;

trait ImageFunctionality
{
    public function addImage(UploadedFile $file)
    {
        $file = FileUploader::upload($file);

        $image = Image::forceCreate([
            'path'      => $file
        ]);

        return $this->images()->save($image);
    }
}
