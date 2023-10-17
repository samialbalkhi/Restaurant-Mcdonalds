<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    public function storeImage($destination)
    {
        $request = request();
        $path = $request->file('image')->store($destination, 'public');

        return $path;
    }

    public function deleteImage($destination)
    {
        if (Storage::exists('public/' . $destination->image)) {
            Storage::delete('public/' . $destination->image);
        }

    }
}
