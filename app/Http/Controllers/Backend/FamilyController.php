<?php

namespace App\Http\Controllers\Backend;

use App\Models\Family;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\FamilyRequest;

class FamilyController extends Controller
{
    public function index()
    {
        $Family = Family::with(['section:id,name'])->get();

        $respones = [
            'Family' => $Family,
        ];
        return $respones;
    }

    public function store(FamilyRequest $request, $id)
    {
        $FamilyImage = Family::get()->find($id);

        if (Storage::exists('public/' . $FamilyImage->image)) {
            Storage::delete('public/' . $FamilyImage->image);
        }
        $path = $request->image->store('image_Family', 'public');

        $Family = Family::updateOrCreate(
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

        $respones = [
            'Family' => $Family,
        ];

        return response($respones, 201);
    }
}
