<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Ourresponsibility;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\OurResponsibilityRequest;

class OurResponsibilityController extends Controller
{
    public function index()
    {
        $Ourresponsibility = Ourresponsibility::with(['section:id,name'])->get();

        $respones = [
            'Ourresponsibility' => $Ourresponsibility,
        ];

        return response($respones, 201);
    }

    public function store(OurResponsibilityRequest $request)
    {
        $path = $request->image->store('images_Ourresponsibility', 'public');
        $Ourresponsibility = Ourresponsibility::create([
            'title' => $request->title,
            'description' => $request->description,
            'message' => $request->message,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        $respones = [
            'Ourresponsibility' => $Ourresponsibility,
        ];

        return response($respones, 201);
    }

    public function edit($id)
    {
        $Ourresponsibility = Ourresponsibility::with(['section:id,name'])->findOrFail($id);
        $respones = [
            'Ourresponsibility' => $Ourresponsibility,
        ];

        return response($respones, 201);
    }

    public function update(OurResponsibilityRequest $request, $id)
    {
        $Ourresponsibility = Ourresponsibility::get()->find($id);

        if (Storage::exists('public/' . $Ourresponsibility->image)) {
            Storage::delete('public/' . $Ourresponsibility->image);
        }
        $path = $request->image->store('images_Ourresponsibility', 'public');

        $Ourresponsibility->update([
            'title' => $request->title,
            'description' => $request->description,
            'message' => $request->message,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);
        $respones = [
            'Ourresponsibility' => 'Updateed Product successfully',
            'image' => $path,
        ];
        return response($respones, 201);
    }

    public function destroy(string $id)
    {
        $Ourresponsibility = Ourresponsibility::get()->find($id);

        if (Storage::exists('public/' . $Ourresponsibility->image)) {
            Storage::delete('public/' . $Ourresponsibility->image);
        }

        Ourresponsibility::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
