<?php

namespace LaravelScaffold\Traits;

use Illuminate\Http\UploadedFile;

trait ImageFunctionality
{
    public function addImage(UploadedFile $file)
    {
        $file = FileUploader::upload($file);

        $image = new Image([
            'path'      => $file
        ]);

        return $this->images()->save($image);
    }
}
