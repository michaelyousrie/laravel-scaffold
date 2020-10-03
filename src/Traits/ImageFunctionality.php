<?php

namespace LaravelScaffold\Traits;

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
