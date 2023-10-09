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
            'message' => $request->message,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        return response()->json($OurResponsibility, 201);
    }

    public function edit(Ourresponsibility $ourresponsibility)
    {
        $OurResponsibilityId = $ourresponsibility->id;
        $OurResponsibility = Ourresponsibility::where('id', $OurResponsibilityId)->first();
        return response()->json($OurResponsibility);
    }

    public function update(OurResponsibilityRequest $request, Ourresponsibility $ourresponsibility)
    {
        if (Storage::exists('public/' . $ourresponsibility->image)) {
            Storage::delete('public/' . $ourresponsibility->image);
        }
        $path = $this->storeImage('images_OurResponsibility');

        $ourresponsibility = $ourresponsibility->update([
            'title' => $request->title,
            'description' => $request->description,
            'message' => $request->message,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        return response()->json([
            'message' => 'Updateed  successfully',
        ]);
    }

    public function destroy(Ourresponsibility $ourresponsibility)
    {
        if (Storage::exists('public/' . $ourresponsibility->image)) {
            Storage::delete('public/' . $ourresponsibility->image);
        }

        $ourresponsibility->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
