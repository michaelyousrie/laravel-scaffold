<?php

namespace LaravelScaffold\Traits;

use Illuminate\Http\UploadedFile;
use LaravelScaffold\Models\Image;
use LaravelScaffold\Helpers\FileUploader;

trait ImageFunctionality
{
    public function addImage(UploadedFile $file)
    {
        $file = FileUploader::upload($file, storage_path("images"));

        $image = new Image([
            'path'      => $file
        ]);

        return $this->images()->save($image);
    }
}
