<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    public function storeImage($destination)
    {
        $request = request();
        $path = $request->file('image')->store($destination, 'public');
        return $path;
    }
}
