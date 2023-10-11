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

        return response()->json($family);
    }
    public function edit(Family $family)
    {
        $family = Family::where('id', $family->id)->first();

        return response()->json($family);
    }

    public function update(FamilyRequest $request, Family $family)
    {
        $path = $this->UpdateOrDeleteImage($family);
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
        $this->UpdateOrDeleteImage($family);
        $family->delete();
        return response()->json(['message' => 'deleted successfully']);
    }
}
