<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SectionRequest;
use App\Models\Section;
use App\Traits\ImageUploadTrait;

class SectionController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        return response()->json(
            Section::all());
    }

    public function store(SectionRequest $request)
    {
        $path = $this->storeImage('images_section');

        $section = Section::create([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->status,
            'image' => $path,
        ]);

        return response()->json($section, 201);
    }

    public function edit(Section $section)
    {
        return response()->json(
            $section->find($section->id));
    }

    public function update(SectionRequest $request, Section $section)
    {
        $this->deleteImage($section);
        $path = $this->storeImage('images_section');

        $section->update([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->status,
            'image' => $path,
        ]);

        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Section $section)
    {
        $this->deleteImage($section);

        $section->delete();

        return response()->json(['message' => 'Deleted successfully'], 202);
    }
}
