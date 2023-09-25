<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\SectionRequest;

class SectionController extends Controller
{
    public function index()
    {
        $Section = Section::all();

        $respones = [
            'Section' => $Section,
        ];

        return response($respones, 201);
    }

    public function store(SectionRequest $request)
    {
        $path = $request->image->store('images_Section', 'public');
        $Section = Section::create([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->status,
            'image' => $path,
        ]);

        $respones = [
            'Section' => $Section,
        ];

        return response($respones, 201);
    }

    public function edit(string $id)
    {
        $Section = Section::findOrFail($id);

        $respones = [
            'Section' => $Section,
        ];

        return response($respones, 201);
    }

    public function update(SectionRequest $request, string $id)
    {
        $SectionImage = Section::get()->find($id);

        if (Storage::exists('public/' . $SectionImage->image)) {
            Storage::delete('public/' . $SectionImage->image);
        }
        $path = $request->image->store('images_Section', 'public');

        $SectionImage->update([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->status,
            'image' => $path,
        ]);

        $respones = [
            'Section' => 'Updateed Category successfully',
            'image' => $path,
        ];
        return response($respones, 201);
    }

    public function destroy(string $id)
    {
        $SectionImage = Section::get()->find($id);
        if (Storage::exists('public/' . $SectionImage->image)) {
            Storage::delete('public/' . $SectionImage->image);
        }
        Section::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
