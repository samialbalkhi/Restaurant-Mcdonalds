<?php

namespace App\Http\Controllers\Backend;

use App\Models\Family;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\FamilyRequest;

class FamilyController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $family = Family::with(['section:id,name'])->get();

        return response()->json($family);
    }

    public function store(FamilyRequest $request, Family $family)
    {
        $path = $this->UpdateOrDeleteImage($family);
        $path = $this->storeImage('image_family');

        $family = Family::updateOrCreate(
            [
                'section_id' => $request->section_id,
            ],
            [
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $path,
            ],
        );

        return response()->json($family);
    }
}
