<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FamilyRequest;
use App\Models\Family;
use App\Models\Section;
use App\Traits\ImageUploadTrait;

class FamilyController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {

        return response()->json(
            Family::with(['section:id,name'])->get());
    }

    public function store(FamilyRequest $request)
    {
        $path = $this->storeImage('image_family');
        $section = Section::find($request->section_id);

        $family = $section->families()->create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        return response()->json($family, 201);
    }

    public function edit(Family $family)
    {

        return response()->json(
            $family->find($family->id));
    }

    public function update(FamilyRequest $request, Family $family)
    {
        $this->deleteImage($family);
        $path = $this->storeImage('image_family');

        $family->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Family $family)
    {
        $this->deleteImage($family);
        $family->delete();

        return response()->json(['message' => 'deleted successfully'], 202);
    }
}
