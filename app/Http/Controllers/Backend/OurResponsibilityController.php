<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Models\Ourresponsibility;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\OurResponsibilityRequest;

class OurResponsibilityController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $OurResponsibility = Ourresponsibility::with(['section:id,name'])->get();

        return response()->json($OurResponsibility);
    }

    public function store(OurResponsibilityRequest $request)
    {
        $path = $this->storeImage('images_OurResponsibility');

        $section = Section::find($request->section_id);

        $OurResponsibility = $section->OurResponsibility()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        return response()->json($OurResponsibility, 201);
    }

    public function edit(Ourresponsibility $ourresponsibility)
    {
        $OurResponsibility = Ourresponsibility::where('id', $ourresponsibility->id)->first();
        return response()->json($OurResponsibility);
    }

    public function update(OurResponsibilityRequest $request, Ourresponsibility $ourresponsibility)
    {
        $this->deleteImage($ourresponsibility);

        $path = $this->storeImage('images_OurResponsibility');

        $ourresponsibility = $ourresponsibility->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        return response()->json([
            'message' => 'Updateed  successfully',
        ]);
    }

    public function destroy(Ourresponsibility $ourresponsibility)
    {
        $this->deleteImage($ourresponsibility);

        $ourresponsibility->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
