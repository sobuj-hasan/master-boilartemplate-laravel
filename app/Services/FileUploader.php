<?php

namespace App\Services;

class FileUploader
{
    public function uploader($file, $fieldName, $pathName)
    {
        if ($file->hasFile($fieldName)) {
            $uploadPath = 'public/images/'.$pathName;
            $image      = $file->file($fieldName);
            $fileName   = rand(19, 199).time().'.'.$image->getClientOriginalExtension();
            $filePath = $pathName.'/'.$fileName;
            $image->storeAs($uploadPath, $fileName);
            return $filePath;
        }
    }
}
