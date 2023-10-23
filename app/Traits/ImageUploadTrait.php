<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    public function storeImage($folder)
    {
        $request = request();
        $path = $request->file('image')->store($folder, 'public');
        
        return $path;
    }

    public function deleteImage($folder)
    {
        if (Storage::exists('public/' . $folder->image)) {
            Storage::delete('public/' . $folder->image);
        }

    }
}
